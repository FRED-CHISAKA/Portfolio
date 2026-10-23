
<?php
require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/../include/config.php';

// Only super administrators may manage administrator accounts.
if (($_SESSION['admin_role'] ?? '') !== 'super_admin') {
    http_response_code(403);
    exit('Access denied. You are not authorized to manage administrators.');
}

// Generate a CSRF token for admin-management actions.
if (empty($_SESSION['admin_csrf_token'])) {
    $_SESSION['admin_csrf_token'] = bin2hex(random_bytes(32));
}

$csrfToken = $_SESSION['admin_csrf_token'];
$currentAdminId = (int) $_SESSION['admin_id'];

// Fetch administrator accounts.
$sql = "SELECT id, name, email, role, status, created_at
        FROM admins
        ORDER BY created_at DESC, id DESC";

$result = mysqli_query($conn, $sql);

if (!$result) {
    error_log('Failed to retrieve administrator accounts.');
    http_response_code(500);
    exit('Unable to load administrator accounts. Please try again later.');
}

$admins = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Helper to safely display database values.
function adminEscape($value): string
{
    return htmlspecialchars(
        (string) ($value ?? ''),
        ENT_QUOTES,
        'UTF-8'
    );
}

include __DIR__ . '/header.php';
include __DIR__ . '/sidebar.php';
?>








<div class="page-wrapper">
    <div class="content">






    
<?php
$messages = [
    'added'       => ['success', 'Administrator created successfully.'],
    'updated'     => ['success', 'Administrator updated successfully.'],
    'deleted'     => ['success', 'Administrator deleted successfully.'],
    'invalid'     => ['danger', 'Invalid administrator ID.'],
    'not_found'   => ['warning', 'Administrator account was not found.'],
    'self_delete' => ['warning', 'You cannot delete your own account here.'],
    'delete_error'=> ['danger', 'Unable to delete the administrator.']
];

$messageKey = $_GET['message'] ?? '';

if (isset($messages[$messageKey])):
    [$type, $messageText] = $messages[$messageKey];
?>
    <div class="alert alert-<?= htmlspecialchars($type, ENT_QUOTES, 'UTF-8') ?>"
         role="alert">
        <?= htmlspecialchars($messageText, ENT_QUOTES, 'UTF-8') ?>
    </div>
<?php endif; ?>


        <!-- Page heading -->
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">System Admins</h4>
                <p class="text-muted">
                    Manage administrator accounts, roles and access status.
                </p>
            </div>

            <div class="col-sm-6 text-right m-b-30">
                <a href="add-admin.php"
                   class="btn btn-primary btn-rounded">
                    <i class="fa fa-plus"></i> Add Admin
                </a>
            </div>
        </div>

        <!-- Summary cards -->
        <?php
        $totalAdmins = count($admins);
        $activeAdmins = 0;
        $superAdmins = 0;

        foreach ($admins as $admin) {
            if ($admin['status'] === 'active') {
                $activeAdmins++;
            }

            if ($admin['role'] === 'super_admin') {
                $superAdmins++;
            }
        }
        ?>

        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-muted">Total Admins</h6>
                        <h3><?= $totalAdmins ?></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-muted">Active Admins</h6>
                        <h3><?= $activeAdmins ?></h3>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-muted">Super Admins</h6>
                        <h3><?= $superAdmins ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Administrator table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Administrator Accounts</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Administrator</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php if (empty($admins)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            No administrator accounts found.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($admins as $index => $admin): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>

                                            <td>
                                                <strong>
                                                    <?= adminEscape($admin['name']) ?>
                                                </strong>

                                                <?php if (
                                                    (int) $admin['id'] === $currentAdminId
                                                ): ?>
                                                    <span class="text-muted">
                                                        (You)
                                                    </span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?= adminEscape($admin['email']) ?>
                                            </td>

                                            <td>
                                                <?php if ($admin['role'] === 'super_admin'): ?>
                                                    <span class="badge badge-primary">
                                                        Super Admin
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-info">
                                                        Admin
                                                    </span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php if ($admin['status'] === 'active'): ?>
                                                    <span class="badge badge-success">
                                                        Active
                                                    </span>
                                                <?php else: ?>
                                                    <span class="badge badge-danger">
                                                        Inactive
                                                    </span>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php
                                                $createdAt = strtotime(
                                                    $admin['created_at'] ?? ''
                                                );

                                                echo $createdAt !== false
                                                    ? date('d M Y, H:i', $createdAt)
                                                    : '—';
                                                ?>
                                            </td>

                                            <td class="text-right">
                                                <a
                                                    href="edit-admin.php?id=<?= (int) $admin['id'] ?>"
                                                    class="btn btn-sm btn-info"
                                                    title="Edit administrator"
                                                >
                                                    <i class="fa fa-pencil"></i>
                                                    Edit
                                                </a>

                                                <?php if (
                                                    (int) $admin['id'] !== $currentAdminId
                                                ): ?>
                                                    <form
                                                        action="delete-admin.php"
                                                        method="POST"
                                                        class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this administrator account?');"
                                                    >
                                                        <input
                                                            type="hidden"
                                                            name="id"
                                                            value="<?= (int) $admin['id'] ?>"
                                                        >

                                                        <input
                                                            type="hidden"
                                                            name="csrf_token"
                                                            value="<?= adminEscape($csrfToken) ?>"
                                                        >

                                                        <button
                                                            type="submit"
                                                            class="btn btn-sm btn-danger"
                                                            title="Delete administrator"
                                                        >
                                                            <i class="fa fa-trash"></i>
                                                            Delete
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-secondary"
                                                        disabled
                                                        title="You cannot delete your own account here"
                                                    >
                                                        <i class="fa fa-lock"></i>
                                                        Delete
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include __DIR__ . '/footer.php'; ?>
