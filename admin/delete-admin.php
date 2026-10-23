
<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../include/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: admins.php');
    exit;
}

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$token = $_POST['csrf_token'] ?? '';
$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if (
    !is_string($token) ||
    empty($_SESSION['admin_csrf_token']) ||
    !hash_equals($_SESSION['admin_csrf_token'], $token)
) {
    http_response_code(403);
    exit('Invalid request token. Please return to the administrators page and try again.');
}

if (!$id || $id < 1) {
    header('Location: admins.php?message=invalid');
    exit;
}

// Prevent deleting the currently logged-in administrator.
if ((int) $_SESSION['admin_id'] === (int) $id) {
    header('Location: admins.php?message=self_delete');
    exit;
}

// Delete the selected administrator using a prepared statement.
$stmt = $conn->prepare('DELETE FROM admins WHERE id = ?');
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    $deleted = $stmt->affected_rows;
    $stmt->close();

    header(
        'Location: admins.php?message=' .
        ($deleted > 0 ? 'deleted' : 'not_found')
    );
    exit;
}

error_log('Failed to delete administrator: ' . $stmt->error);
$stmt->close();

header('Location: admins.php?message=delete_error');
exit;
