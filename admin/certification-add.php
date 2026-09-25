<?php

    include "../include/config.php";

    /* Upload Configuration

    | Files will be stored inside: ../assets/uploads/certifications/
    | The database will store: assets/uploads/certifications/filename.ext
    */

    $upload_dir = "../assets/uploads/certifications/";
    $db_upload_dir = "assets/uploads/certifications/";

    $success = "";
    $error = "";

    /* Create Upload Directory If It Does Not Exist */
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    /* Handle Form Submission */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $issuer = trim($_POST['issuer'] ?? '');
        $issue_date = !empty($_POST['issue_date']) ? $_POST['issue_date'] : NULL;
        $credential_id = trim($_POST['credential_id'] ?? '');
        $url = trim($_POST['url'] ?? '');
        $status = isset($_POST['status']) ? (int)$_POST['status'] : 1;

        /* Validate Required Fields */
        if ($title == "") {
            $error = "Certification title is required.";

        } else {

            $file_path = "";

            /* Handle File Upload */
            if (isset($_FILES['certificate_file']) &&
                $_FILES['certificate_file']['error'] != UPLOAD_ERR_NO_FILE) {

                $file = $_FILES['certificate_file'];

                if ($file['error'] !== UPLOAD_ERR_OK) {

                    $error = "There was an error uploading the certificate.";

                } else {

                    /* Allowed File Types */
                    $allowed_extensions = [
                        'jpg', 'jpeg', 'png', 'gif', 'webp', 'pdf', 'doc', 'docx'
                    ];

                    $original_name = $file['name'];
                    $extension = strtolower(
                        pathinfo($original_name, PATHINFO_EXTENSION)
                    );

                    if (!in_array($extension, $allowed_extensions)) {
                        $error = "Invalid file type. Allowed files: JPG, JPEG, PNG, GIF, WEBP, PDF, DOC and DOCX.";

                    } else {

                        /* File Size Maximum = 10MB */
                        $max_size = 10 * 1024 * 1024;

                        if ($file['size'] > $max_size) {
                            $error = "The file is too large. Maximum allowed size is 10MB.";

                        } else {

                            /* Generate Unique File Name */
                            $new_file_name =
                                'cert_' .
                                time() .
                                '_' .
                                bin2hex(random_bytes(5)) .
                                '.' .
                                $extension;

                            $target_file = $upload_dir . $new_file_name;

                            /* Move Uploaded File */
                            if (move_uploaded_file($file['tmp_name'], $target_file)) {

                                $file_path = $db_upload_dir . $new_file_name;

                            } else {

                                $error = "Failed to save the uploaded certificate file.";
                            }
                        }
                    }
                }
            }

            /* Insert Certification */
            if ($error == "") {

                $sql = "INSERT INTO certifications
                        (
                            title, description, issuer, issue_date, credential_id, url, img, status
                        )
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = mysqli_prepare($conn, $sql);

                if ($stmt) {

                    mysqli_stmt_bind_param(
                        $stmt,
                        "sssssssi",
                        $title, $description, $issuer, $issue_date, $credential_id, $url, $file_path, $status
                    );

                    if (mysqli_stmt_execute($stmt)) {

                        mysqli_stmt_close($stmt);
                        header("Location: certifications.php?success=added");
                        exit;

                    } else {

                        /* Remove Uploaded File If Database Insert Failed */
                        if ($file_path != "") {

                            $uploaded_file = "../" . $file_path;

                            if (file_exists($uploaded_file)) {
                                unlink($uploaded_file);
                            }
                        }
                        $error = "Failed to add certification. Please try again.";
                    }

                } else {
                    $error = "Database error: Unable to prepare the query.";
                }
            }
        }
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
                    Add Certification
                </h4>
                <p class="text-muted">
                    Add a professional certification or credential to your portfolio.
                </p>
            </div>

            <div class="col-sm-4 text-right">
                <a href="certifications.php" class="btn btn-secondary btn-rounded">
                    <i class="fa fa-arrow-left"></i>
                    Back to Certifications
                </a>
            </div>
        </div>

        <!-- Error Message -->
        <?php if ($error != "") { ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fa fa-exclamation-circle me-2"></i>
                <?= htmlspecialchars($error) ?>

                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        <?php } ?>

        <!-- Certification Form -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="bi bi-patch-check me-2"></i>
                    Certification Information
                </h5>
            </div>

            <div class="card-body">

                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Certification Title -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Certification Title
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="title" class="form-control"
                                   placeholder="e.g. Huawei Certified Storage Associate"
                                   value="<?= htmlspecialchars($_POST['title'] ?? '') ?>"
                                   required>
                        </div>

                        <!-- Issuing Organization -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Issuing Organization
                            </label>

                            <input type="text" name="issuer" class="form-control" placeholder="e.g. Huawei"
                                   value="<?= htmlspecialchars($_POST['issuer'] ?? '') ?>">
                        </div>

                        <!-- Issue Date -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Issue Date
                            </label>

                            <input type="date" name="issue_date" class="form-control"
                                   value="<?= htmlspecialchars($_POST['issue_date'] ?? '') ?>">
                        </div>

                        <!-- Credential ID -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Credential ID
                            </label>

                            <input type="text" name="credential_id" class="form-control" placeholder="e.g. HUA-123456"
                                   value="<?= htmlspecialchars($_POST['credential_id'] ?? '') ?>">
                        </div>

                        <!-- Status -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">
                                Status
                            </label>

                            <select name="status" class="form-control">
                                <option value="1"
                                    <?= (($_POST['status'] ?? '1') == '1') ? 'selected' : '' ?>>
                                    Active
                                </option>

                                <option value="0" <?= (($_POST['status'] ?? '') == '0') ? 'selected' : '' ?>>
                                    Hidden
                                </option>
                            </select>
                        </div>

                        <!-- Verification URL -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                Verification URL
                            </label>

                            <input type="url" name="url" class="form-control" placeholder="https://..."
                                   value="<?= htmlspecialchars($_POST['url'] ?? '') ?>">

                            <small class="text-muted">
                                Optional link where the certificate can be verified online.
                            </small>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                Description
                            </label>

                            <textarea name="description" class="form-control" rows="4"
                                      placeholder="Brief description of the certification..."><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
                        </div>

                        <!-- Certificate File -->
                        <div class="col-md-12 mb-4">
                            <label class="form-label">
                                Certificate Image / Document
                            </label>

                            <input type="file" name="certificate_file" class="form-control"
                                   accept=".jpg,.jpeg,.png,.gif,.webp,.pdf,.doc,.docx">

                            <small class="text-muted">
                                Allowed: JPG, JPEG, PNG, GIF, WEBP, PDF, DOC and DOCX.
                                Maximum size: 10MB.
                            </small>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="border-top pt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i>
                            Save Certification
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
