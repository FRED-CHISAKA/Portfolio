<?php
require_once "crud-helper.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $v0 = post_string('title');
    $v1 = post_string('organization');
    $v2 = post_int('year');
    $v3 = post_string('description');

    $sql = "INSERT INTO awards (title, organization, year, description) VALUES (?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        redirect_resume("Unable to prepare the award record.", "danger");
    }

    mysqli_stmt_bind_param($stmt, "ssis", $v0, $v1, $v2, $v3);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        redirect_resume("Add Achievement added successfully.");
    }

    $error = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
}
?>
<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="page-title">Add Achievement</h4>
            </div>
            <div class="col-sm-4 text-right">
                <a href="resume.php" class="btn btn-secondary btn-rounded">
                    <i class="bi bi-arrow-left me-1"></i> Back to Resume
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-white py-3">
                <h3 class="h5 mb-1"><i class="bi bi-trophy me-2"></i>Add Achievement</h3>
                <p class="text-muted small mb-0">Enter the details below.</p>
            </div>

            <div class="card-body p-4">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= e($error) ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Achievement / Award</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Organization</label>
                        <input type="text" name="organization" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Year</label>
                        <input type="number" name="year" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Brief description of the achievement"></textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> Save
                        </button>
                        <a href="resume.php" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
