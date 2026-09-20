<?php
include "../include/config.php";
include "header.php";
include "sidebar.php";

/*
 * Resume Summary Update
 * -----------------------------------------
 * The resume.php page stores the professional
 * summary / career objective in users.slogan.
 *
 * This page updates the profile belonging to
 * user ID 1, matching the existing resume.php
 * implementation.
 */

$user_id = 1;
$message = "";
$message_type = "success";

/* Fetch current user/profile data */
$stmt = mysqli_prepare($conn, "SELECT id, slogan FROM users WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$user) {
    $message = "User profile was not found.";
    $message_type = "danger";
}

/* Handle update */
if ($_SERVER["REQUEST_METHOD"] === "POST" && $user) {

    $slogan = trim($_POST["slogan"] ?? "");

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE users SET slogan = ? WHERE id = ?"
    );

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "si", $slogan, $user_id);

        if (mysqli_stmt_execute($stmt)) {
            $message = "Resume summary updated successfully.";

            /* Keep the textarea showing the saved value */
            $user["slogan"] = $slogan;
        } else {
            $message = "Failed to update the resume summary: " . mysqli_error($conn);
            $message_type = "danger";
        }

        mysqli_stmt_close($stmt);
    } else {
        $message = "Unable to prepare the update query: " . mysqli_error($conn);
        $message_type = "danger";
    }
}
?>

<div class="page-wrapper">
    <div class="content">
        <div class="container-fluid">

            <!-- Page Title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Resume Summary</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="resume.php">Resume</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Resume Summary
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Alert -->
            <?php if (!empty($message)): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-<?= htmlspecialchars($message_type, ENT_QUOTES, "UTF-8") ?> alert-dismissible fade show" role="alert">
                            <?= htmlspecialchars($message, ENT_QUOTES, "UTF-8") ?>
                            <button type="button"
                                    class="btn-close"
                                    data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Resume Summary Form -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                Professional Summary / Career Objective
                            </h5>
                        </div>

                        <div class="card-body">

                            <?php if ($user): ?>

                                <form method="POST" action="resume-summary-update.php">

                                    <div class="mb-3">
                                        <label for="slogan" class="form-label">
                                            Resume Summary
                                        </label>

                                        <textarea
                                            name="slogan"
                                            id="slogan"
                                            class="form-control"
                                            rows="8"
                                            placeholder="Enter your professional summary or career objective..."
                                            required><?= htmlspecialchars((string)($user["slogan"] ?? ""), ENT_QUOTES, "UTF-8") ?></textarea>

                                        <div class="form-text">
                                            Write a concise professional summary describing
                                            your background, skills, experience and career
                                            direction.
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ri-save-line align-middle me-1"></i>
                                            Update Summary
                                        </button>

                                        <a href="resume.php" class="btn btn-light">
                                            <i class="ri-arrow-left-line align-middle me-1"></i>
                                            Back to Resume
                                        </a>
                                    </div>

                                </form>

                            <?php else: ?>

                                <div class="alert alert-danger mb-0">
                                    Unable to load the resume profile.
                                </div>

                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<?php include "footer.php"; ?>
