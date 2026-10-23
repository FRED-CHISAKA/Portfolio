
<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../include/config.php';

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (empty($_SESSION['admin_csrf_token'])) {
    $_SESSION['admin_csrf_token'] = bin2hex(random_bytes(32));
}

$errors = [];
$name = '';
$email = '';
$role = 'admin';
$status = 'active';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? 'admin';
    $status = $_POST['status'] ?? 'active';
    $token = $_POST['csrf_token'] ?? '';

    if (
        !is_string($token) ||
        !hash_equals($_SESSION['admin_csrf_token'], $token)
    ) {
        $errors[] = 'Invalid request token. Please refresh and try again.';
    }

    if ($name === '' || strlen($name) > 100) {
        $errors[] = 'Enter a name of up to 100 characters.';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 255) {
        $errors[] = 'Enter a valid email address.';
    }

    if (strlen($password) < 8) {
        $errors[] = 'The password must contain at least 8 characters.';
    }

    if (!in_array($role, ['admin', 'super_admin'], true)) {
        $errors[] = 'Select a valid administrator role.';
    }

    if (!in_array($status, ['active', 'inactive'], true)) {
        $errors[] = 'Select a valid account status.';
    }

    if (!$errors) {
        $check = $conn->prepare(
            'SELECT id FROM admins WHERE email = ? LIMIT 1'
        );
        $check->bind_param('s', $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $errors[] = 'An administrator with this email already exists.';
        }
        $check->close();
    }

    if (!$errors) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare(
            'INSERT INTO admins (name, email, password, role, status)
             VALUES (?, ?, ?, ?, ?)'
        );

        $stmt->bind_param(
            'sssss',
            $name,
            $email,
            $passwordHash,
            $role,
            $status
        );

        if ($stmt->execute()) {
            $stmt->close();
            header('Location: admins.php?message=added');
            exit;
        }

        error_log('Failed to create administrator: ' . $stmt->error);
        $errors[] = 'Unable to create the administrator. Please try again.';
        $stmt->close();
    }
}

function addAdminEscape($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

include __DIR__ . '/header.php';
include __DIR__ . '/sidebar.php';
?>

<div class="page-wrapper">
    <div class="content">
        <div class="row align-items-center">
            <div class="col-sm-8">
                <h4 class="page-title">Add Administrator</h4>
            </div>
            <div class="col-sm-4 text-right">
                <a href="admins.php" class="btn btn-secondary btn-rounded">
                    <i class="fa fa-arrow-left"></i> Back to Admins
                </a>
            </div>
        </div>

        <?php if ($errors): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?= addAdminEscape($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="add-admin.php">
                            <input type="hidden" name="csrf_token"
                                   value="<?= addAdminEscape($_SESSION['admin_csrf_token']) ?>">

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name"
                                       class="form-control" maxlength="100"
                                       value="<?= addAdminEscape($name) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email"
                                       class="form-control" maxlength="255"
                                       value="<?= addAdminEscape($email) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Initial Password</label>
                                <input type="password" id="password" name="password"
                                       class="form-control" minlength="8"
                                       autocomplete="new-password" required>
                                <small class="form-text text-muted">
                                    Use a strong, unique password.
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role" name="role" class="form-control" required>
                                    <option value="admin"
                                        <?= $role === 'admin' ? 'selected' : '' ?>>
                                        Admin
                                    </option>
                                    <option value="super_admin"
                                        <?= $role === 'super_admin' ? 'selected' : '' ?>>
                                        Super Admin
                                    </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="status">Account Status</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="active"
                                        <?= $status === 'active' ? 'selected' : '' ?>>
                                        Active
                                    </option>
                                    <option value="inactive"
                                        <?= $status === 'inactive' ? 'selected' : '' ?>>
                                        Inactive
                                    </option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-rounded">
                                <i class="fa fa-save"></i> Create Administrator
                            </button>

                            <a href="admins.php" class="btn btn-secondary btn-rounded">
                                Cancel
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/footer.php'; ?>
