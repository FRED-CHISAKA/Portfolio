<?php
    require_once "crud-helper.php";

    $id = require_id();

    $sql = "SELECT * FROM interests WHERE id = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        redirect_resume("Unable to load the interest record.", "danger");
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $record = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if (!$record) {
        redirect_resume("The requested interest record was not found.", "danger");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $v_name = post_string('name');

        $sql = "UPDATE interests SET name = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt) {
            $error = "Unable to prepare the update.";
        } else {
            mysqli_stmt_bind_param($stmt, "si", $v_name, $id);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                redirect_resume("Edit Interest updated successfully.");
            }

            $error = mysqli_stmt_error($stmt);
            mysqli_stmt_close($stmt);
        }

        foreach (["name"] as $field) {
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
                <h4 class="page-title">Edit Interest</h4>
            </div>
            <div class="col-sm-4 text-right">
                <a href="resume.php" class="btn btn-secondary btn-rounded">
                    <i class="bi bi-arrow-left me-1"></i> Back to Resume
                </a>
            </div>
        </div>

        <div class="card shadow-sm border-0 mt-3">
            <div class="card-header bg-white py-3">
                <h3 class="h5 mb-1"><i class="bi bi-heart me-2"></i>Edit Interest</h3>
                <p class="text-muted small mb-0">Update the details below.</p>
            </div>

            <div class="card-body p-4">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= e($error) ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Interest</label>
                        <input type="text" name="name" value="<?= e($record['name']) ?>" class="form-control" required>
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
