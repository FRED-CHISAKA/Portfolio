
<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Require an authenticated administrator.
if (
    !isset($_SESSION['admin_id']) ||
    !isset($_SESSION['admin_role']) ||
    !in_array(
        $_SESSION['admin_role'],
        ['admin', 'super_admin'],
        true
    )
) {
    header('Location: login.php');
    exit;
}


if (empty($_SESSION['logout_token'])) {
    $_SESSION['logout_token'] = bin2hex(random_bytes(32));
}


// Prevent caching of protected pages.
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
