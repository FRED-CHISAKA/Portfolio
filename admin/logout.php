
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Only allow logout requests submitted through POST.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Validate the logout request.
if (
    !isset($_SESSION['logout_token']) ||
    !isset($_POST['logout_token']) ||
    !is_string($_POST['logout_token']) ||
    !hash_equals($_SESSION['logout_token'], $_POST['logout_token'])
) {
    http_response_code(403);
    exit('Invalid logout request. Please refresh the page and try again.');
}

// Clear all session data.
$_SESSION = [];

// Remove the session cookie.
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        [
            'expires' => time() - 42000,
            'path' => $params['path'],
            'domain' => $params['domain'],
            'secure' => $params['secure'],
            'httponly' => $params['httponly'],
            'samesite' => $params['samesite'] ?? 'Lax'
        ]
    );
}

// Destroy the session.
session_destroy();

// Return to login.
header('Location: login.php?logged_out=1');
exit;
