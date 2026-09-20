<?php
require_once "crud-helper.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $v0 = post_string('job_title');
    $v1 = post_string('company');
    $v2 = post_string('location');
    $v3 = post_int('start_year');
    $v4 = post_int('end_year');
    $v5 = isset($_POST['is_present']) ? 1 : 0;
    $v6 = post_string('status');
    $v7 = $user_id;

    $sql = "INSERT INTO experience (job_title, company, location, start_year, end_year, is_present, status, user_id) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        redirect_resume("Unable to prepare the experience record.", "danger");
    }

    mysqli_stmt_bind_param($stmt, "sssiiisi", $v0, $v1, $v2, $v3, $v4, $v5, $v6, $v7);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        redirect_resume("Add Experience added successfully.");
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
                <h4 class="page-title">Add Experience</h4>
            </div>
            <div class="col-sm-4 text-right">
                <a href="resume.php" class="btn btn-secondary btn-rounded">
                    <i class="bi bi-arrow-left me-1"></i> Back to Resume
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-white py-3">
                <h3 class="h5 mb-1"><i class="bi bi-briefcase me-2"></i>Add Experience</h3>
                <p class="text-muted small mb-0">Enter the details below.</p>
            </div>

            <div class="card-body p-4">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= e($error) ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Position / Job Title</label>
                        <input type="text" name="job_title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Company / Organization</label>
                        <input type="text" name="company" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Start Year</label>
                        <input type="number" name="start_year" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Year</label>
                        <input type="number" name="end_year" class="form-control">
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" name="is_present" value="1" class="form-check-input" id="is_present">
                        <label class="form-check-label" for="is_present">Currently Working Here</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Hidden</option>
                        </select>
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
