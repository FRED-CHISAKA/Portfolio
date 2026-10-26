
<?php
    require_once __DIR__ . '/auth.php';
    require_once __DIR__ . '/../include/config.php';

    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    if (empty($_SESSION['admin_csrf_token'])) {
        $_SESSION['admin_csrf_token'] = bin2hex(random_bytes(32));
    }

    function editAdminEscape($value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }

    $errors = [];
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    }

    if (!$id || $id < 1) {
        header('Location: admins.php?message=invalid');
        exit;
    }

    // Load the existing account.
    $stmt = $conn->prepare(
        'SELECT id, name, email, role, status
        FROM admins WHERE id = ? LIMIT 1'
    );
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $admin = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$admin) {
        header('Location: admins.php?message=not_found');
        exit;
    }

    $name = $admin['name'];
    $email = $admin['email'];
    $role = $admin['role'];
    $status = $admin['status'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $newPassword = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? '';
        $status = $_POST['status'] ?? '';
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

        if ($newPassword !== '' && strlen($newPassword) < 8) {
            $errors[] = 'A new password must contain at least 8 characters.';
        }

        if (!in_array($role, ['admin', 'super_admin'], true)) {
            $errors[] = 'Select a valid administrator role.';
        }

        if (!in_array($status, ['active', 'inactive'], true)) {
            $errors[] = 'Select a valid account status.';
        }

        if (!$errors) {
            $check = $conn->prepare(
                'SELECT id FROM admins WHERE email = ? AND id <> ? LIMIT 1'
            );
            $check->bind_param('si', $email, $id);
            $check->execute();
            $check->store_result();

            if ($check->num_rows > 0) {
                $errors[] = 'Another administrator already uses this email.';
            }
            $check->close();
        }

        if (!$errors) {
            if ($newPassword !== '') {
                $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);

                $update = $conn->prepare(
                    'UPDATE admins
                    SET name = ?, email = ?, password = ?, role = ?, status = ?
                    WHERE id = ?'
                );
                $update->bind_param(
                    'sssssi',
                    $name,
                    $email,
                    $passwordHash,
                    $role,
                    $status,
                    $id
                );
            } else {
                $update = $conn->prepare(
                    'UPDATE admins
                    SET name = ?, email = ?, role = ?, status = ?
                    WHERE id = ?'
                );
                $update->bind_param(
                    'ssssi',
                    $name,
                    $email,
                    $role,
                    $status,
                    $id
                );
            }

            if ($update->execute()) {
                $update->close();

                // If editing the current account, refresh its session details.
                if ((int) $_SESSION['admin_id'] === (int) $id) {
                    $_SESSION['admin_name'] = $name;
                    $_SESSION['admin_email'] = $email;
                    $_SESSION['admin_role'] = $role;
                }

                header('Location: admins.php?message=updated');
                exit;
            }

            error_log('Failed to update administrator: ' . $update->error);
            $errors[] = 'Unable to update this administrator. Please try again.';
            $update->close();
        }
    }

    include __DIR__ . '/header.php';
    include __DIR__ . '/sidebar.php';
?>

<div class="page-wrapper">
    <div class="content">
        <div class="row align-items-center">
            <div class="col-sm-8">
                <h4 class="page-title">Edit Administrator</h4>
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
                        <li><?= editAdminEscape($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST"
                              action="edit-admin.php?id=<?= (int) $id ?>">
                            <input type="hidden" name="id" value="<?= (int) $id ?>">
                            <input type="hidden" name="csrf_token"
                                   value="<?= editAdminEscape($_SESSION['admin_csrf_token']) ?>">

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name"
                                       class="form-control" maxlength="100"
                                       value="<?= editAdminEscape($name) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email"
                                       class="form-control" maxlength="255"
                                       value="<?= editAdminEscape($email) ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="password">New Password (optional)</label>
                                <input type="password" id="password" name="password"
                                       class="form-control" minlength="8"
                                       autocomplete="new-password">
                                <small class="form-text text-muted">
                                    Leave blank to keep the current password.
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
                                <i class="fa fa-save"></i> Save Changes
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
