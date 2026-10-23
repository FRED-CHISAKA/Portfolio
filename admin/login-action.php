
<?php


session_start();

// Prevent caching of authenticated pages.
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

// Load the database connection.
require_once __DIR__ . '/config/config.php';

// Accept POST requests only.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

// Read submitted credentials.
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Basic validation.
if ($email === '' || $password === '') {
    $_SESSION['login_error'] = 'Please enter your email and password.';
    header('Location: login.php');
    exit;
}

// Find the administrator by email.
$stmt = $conn->prepare(
    "SELECT id, name, email, password, role, status
     FROM admins
     WHERE email = ?
     LIMIT 1"
);

if (!$stmt) {
    error_log('Admin login query preparation failed.');
    http_response_code(500);
    exit('A server error occurred. Please try again later.');
}

$stmt->bind_param('s', $email);
$stmt->execute();

$result = $stmt->get_result();
$admin = $result->fetch_assoc();

$stmt->close();

// Verify credentials and account status.
if (
    !$admin ||
    $admin['status'] !== 'active' ||
    !password_verify($password, $admin['password'])
) {
    $_SESSION['login_error'] = 'Invalid email or password.';
    header('Location: login.php');
    exit;
}

// Create a fresh session ID after successful login.
session_regenerate_id(true);

// Store the authenticated administrator's identity.
$_SESSION['admin_id'] = (int) $admin['id'];
$_SESSION['admin_name'] = $admin['name'];
$_SESSION['admin_email'] = $admin['email'];
$_SESSION['admin_role'] = $admin['role'];

// Redirect to the admin dashboard.
header('Location: index.php');
exit;
