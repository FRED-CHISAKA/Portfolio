<?php
    require_once "crud-helper.php";

    $id = require_id();

    $sql = "SELECT * FROM education WHERE id = ? AND user_id = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        redirect_resume("Unable to load the education record.", "danger");
    }

    mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $record = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if (!$record) {
        redirect_resume("The requested education record was not found.", "danger");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $v_degree = post_string('degree'); $v_institution = post_string('institution'); $v_location = post_string('location'); $v_start_year = post_int('start_year'); $v_end_year = post_int('end_year'); $v_status = post_string('status');

        $sql = "UPDATE education SET degree = ?, institution = ?, location = ?, start_year = ?, end_year = ?, status = ? WHERE id = ? AND user_id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt) {
            $error = "Unable to prepare the update.";
        } else {
            mysqli_stmt_bind_param($stmt, "sssiisii", $v_degree, $v_institution, $v_location, $v_start_year, $v_end_year, $v_status, $id, $user_id);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                redirect_resume("Edit Education updated successfully.");
            }

            $error = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
        }

        foreach (["degree", "institution", "location", "start_year", "end_year", "status"] as $field) {
            if (array_key_exists($field, $_POST)) {
                $record[$field] = $_POST[$field];
            }
        }
    }
?>
<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-8">
                <h4 class="page-title">Edit Education</h4>
            </div>
            <div class="col-sm-4 text-right">
                <a href="resume.php" class="btn btn-secondary btn-rounded">
                    <i class="bi bi-arrow-left me-1"></i> Back to Resume
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-white py-3">
                <h3 class="h5 mb-1"><i class="bi bi-mortarboard me-2"></i>Edit Education</h3>
                <p class="text-muted small mb-0">Update the details below.</p>
            </div>

            <div class="card-body p-4">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= e($error) ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Degree / Qualification</label>
                        <input type="text" name="degree" value="<?= e($record['degree']) ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Institution</label>
                        <input type="text" name="institution" value="<?= e($record['institution']) ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" name="location" value="<?= e($record['location']) ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Start Year</label>
                        <input type="number" name="start_year" value="<?= e($record['start_year']) ?>" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Year</label>
                        <input type="number" name="end_year" value="<?= e($record['end_year']) ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="">Select Status</option>
                            <option value="1" <?= (string)$record['status'] === '1' ? 'selected' : '' ?>>Active</option>
                            <option value="0" <?= (string)$record['status'] === '0' ? 'selected' : '' ?>>Hidden</option>
                        </select>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg me-1"></i> Update
                        </button>
                        <a href="resume.php" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
