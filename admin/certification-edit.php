<?php

    include "../include/config.php";

    /* Get Certification ID */
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("Location: certifications.php");
        exit;
    }

    $id = (int)$_GET['id'];

    /* Upload Configuration */
    $upload_dir = "../assets/uploads/certifications/";
    $db_upload_dir = "assets/uploads/certifications/";

    /* Make Sure Upload Directory Exists */
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    $error = "";

    /* Get Existing Certification */
    $sql = "SELECT * FROM certifications WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $certification = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    if (!$certification) {
        header("Location: certifications.php");
        exit;
    }

    /* Handle Form Submission */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $issuer = trim($_POST['issuer'] ?? '');
        $issue_date = !empty($_POST['issue_date'])
            ? $_POST['issue_date']
            : NULL;

        $credential_id = trim($_POST['credential_id'] ?? '');
        $url = trim($_POST['url'] ?? '');
        $status = isset($_POST['status'])
            ? (int)$_POST['status']
            : 1;

        /* Validate Title */
        if ($title == "") {
            $error = "Certification title is required.";
        } else {

            /* Keep Existing File */
            $file_path = $certification['img'];

            /* Check For New Upload */
            if (
                isset($_FILES['certificate_file']) &&
                $_FILES['certificate_file']['error'] != UPLOAD_ERR_NO_FILE
            ) {

                $file = $_FILES['certificate_file'];

                if ($file['error'] !== UPLOAD_ERR_OK) {

                    $error = "There was an error uploading the new certificate file.";

                } else {

                    /* Allowed Extensions */
                    $allowed_extensions = [
                        'jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf', 'doc', 'docx'
                    ];

                    $extension = strtolower(
                        pathinfo(
                            $file['name'],
                            PATHINFO_EXTENSION
                        )
                    );

                    if (!in_array($extension, $allowed_extensions)) {
                        $error = "Invalid file type. Allowed files: JPG, JPEG, PNG, GIF, WEBP, PDF, DOC and DOCX.";

                    } else {

                        /* Maximum File Size = 10MB */
                        $max_size = 10 * 1024 * 1024;

                        if ($file['size'] > $max_size) {
                            $error = "The file is too large. Maximum allowed size is 10MB.";

                        } else {

                            /* Generate New File Name */
                            $new_file_name =
                                'cert_' .
                                time() .
                                '_' .
                                bin2hex(random_bytes(5)) .
                                '.' .
                                $extension;

                            $target_file =
                                $upload_dir .
                                $new_file_name;

                            /* Upload New File */
                            if (move_uploaded_file(
                                $file['tmp_name'],
                                $target_file
                            )) {

                                $new_file_path =
                                    $db_upload_dir .
                                    $new_file_name;

                                /* Delete Previous Local File */
                                if (!empty($certification['img'])) {
                                    $old_file =
                                        "../" .
                                        $certification['img'];
                                    /* Only Delete Local Files */

                                    if (
                                        file_exists($old_file) &&
                                        is_file($old_file)
                                    ) {

                                        unlink($old_file);
                                    }
                                }

                                /* Use New File */
                                $file_path = $new_file_path;

                            } else {
                                $error = "Failed to save the new certificate file.";
                            }
                        }
                    }
                }
            }

            /* Update Database */
            if ($error == "") {
                $sql = "UPDATE certifications SET
                            title = ?, description = ?, issuer = ?, issue_date = ?, credential_id = ?,
                            url = ?,
                            img = ?,
                            status = ?
                        WHERE id = ?";

                $stmt = mysqli_prepare($conn, $sql);

                if ($stmt) {

                    mysqli_stmt_bind_param(
                        $stmt,
                        "sssssssii",
                        $title,
                        $description,
                        $issuer,
                        $issue_date,
                        $credential_id,
                        $url,
                        $file_path,
                        $status,
                        $id
                    );

                    if (mysqli_stmt_execute($stmt)) {

                        mysqli_stmt_close($stmt);

                        header(
                            "Location: certifications.php?success=updated"
                        );
                        exit;

                    } else {
                        mysqli_stmt_close($stmt);

                        $error = "Failed to update certification.";
                    }

                } else {

                    $error = "Database error: Unable to prepare the update query.";
                }
            }
        }

        /* Reload Values After Validation Error */
        $certification['title'] = $title;
        $certification['description'] = $description;
        $certification['issuer'] = $issuer;
        $certification['issue_date'] = $issue_date;
        $certification['credential_id'] = $credential_id;
        $certification['url'] = $url;
        $certification['status'] = $status;
    }

    include "header.php";
    include "sidebar.php";
?>

<!-- Main Content -->
<div class="page-wrapper">
    <div class="content">

        <!-- Page Header -->
        <div class="row">
            <div class="col-sm-8">
                <h4 class="page-title">
                    Edit Certification
                </h4>
                <p class="text-muted">
                    Update certification information and certificate files.
                </p>
            </div>

            <div class="col-sm-4 text-right">
                <a href="certifications.php" class="btn btn-secondary btn-rounded">
                    <i class="fa fa-arrow-left"></i>
                    Back to Certifications
                </a>
            </div>
        </div>

        <!-- Error -->
        <?php if ($error != "") { ?>

            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fa fa-exclamation-circle me-2"></i>

                <?= htmlspecialchars($error) ?>

                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        <?php } ?>

        <!-- Edit Form -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-square me-2"></i>
                    Edit Certification
                </h5>
            </div>

            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Certification Title
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="title" class="form-control"
                                   value="<?= htmlspecialchars($certification['title']) ?>"
                                   required>
                        </div>

                        <!-- Issuer -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Issuing Organization
                            </label>

                            <input type="text" name="issuer" class="form-control"
                                   value="<?= htmlspecialchars($certification['issuer'] ?? '') ?>">
                        </div>

                        <!-- Issue Date -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Issue Date
                            </label>

                            <input type="date" name="issue_date" class="form-control"
                                   value="<?= htmlspecialchars($certification['issue_date'] ?? '') ?>">
                        </div>

                        <!-- Credential ID -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Credential ID
                            </label>

                            <input type="text" name="credential_id" class="form-control"
                                   value="<?= htmlspecialchars($certification['credential_id'] ?? '') ?>">
                        </div>

                        <!-- Status -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Status
                            </label>

                            <select name="status" class="form-control">
                                <option value="1"
                                    <?= $certification['status'] == 1 ? 'selected' : '' ?>>
                                    Active
                                </option>

                                <option value="0" <?= $certification['status'] == 0 ? 'selected' : '' ?>>
                                    Hidden
                                </option>
                            </select>
                        </div>

                        <!-- Verification URL -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                Verification URL
                            </label>

                            <input type="url" name="url" class="form-control"
                                   value="<?= htmlspecialchars($certification['url'] ?? '') ?>">
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description" class="form-control"
                                      rows="4"><?= htmlspecialchars($certification['description'] ?? '') ?></textarea>
                        </div>

                        <!-- Current Certificate -->
                        <div class="col-md-12 mb-4">
                            <label class="form-label">
                                Current Certificate
                            </label>

                            <?php if (!empty($certification['img'])) { ?>
                                <?php
                                    $current_file =
                                        "../" .
                                        $certification['img'];

                                    $extension =
                                        strtolower(
                                            pathinfo(
                                                $certification['img'],
                                                PATHINFO_EXTENSION
                                            )
                                        );

                                    $image_extensions = [
                                        'jpg', 'jpeg', 'png', 'gif', 'webp'
                                    ];
                                ?>

                                <div class="border rounded p-3 mb-3">

                                    <?php if (
                                        in_array(
                                            $extension,
                                            $image_extensions
                                        )
                                    ) { ?>

                                        <!-- Image Preview -->
                                        <div class="mb-3">
                                            <img src="<?= htmlspecialchars($current_file) ?>"
                                                 alt="<?= htmlspecialchars($certification['title']) ?>"
                                                 class="img-thumbnail"
                                                 style="max-width: 300px; max-height: 220px; object-fit: contain;">
                                        </div>

                                    <?php } else { ?>

                                        <!-- Document -->
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-file-earmark-text text-primary"
                                                   style="font-size: 50px;">
                                                </i>

                                                <div class="ml-3">
                                                    <strong>
                                                        Current Document
                                                    </strong>

                                                    <br>

                                                    <a href="<?= htmlspecialchars($current_file) ?>"
                                                       target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                                        <i class="bi bi-box-arrow-up-right"></i>
                                                        Open Document
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                    <small class="text-muted">
                                        Current file:
                                        <?= htmlspecialchars(
                                            basename($certification['img'])
                                        ) ?>
                                    </small>
                                </div>

                            <?php } else { ?>
                                <div class="alert alert-light border">
                                    <i class="bi bi-info-circle me-2"></i>
                                    No certificate file has been uploaded.
                                </div>
                            <?php } ?>

                            <!-- New File -->
                            <label class="form-label">
                                Replace Certificate
                            </label>

                            <input type="file" name="certificate_file" class="form-control"
                                   accept=".jpg,.jpeg,.png,.gif,.webp,.pdf,.doc,.docx">

                            <small class="text-muted">
                                Leave this empty if you want to keep the existing file.
                                Allowed: JPG, JPEG, PNG, GIF, WEBP, PDF, DOC and DOCX.
                                Maximum size: 10MB.
                            </small>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="border-top pt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i>
                            Update Certification
                        </button>

                        <a href="certifications.php" class="btn btn-light">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
