<?php
include "../include/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_id = 1;

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: resume.php");
    exit;
}

$slogan = trim($_POST["slogan"] ?? "");

$stmt = mysqli_prepare(
    $conn,
    "UPDATE users SET slogan = ? WHERE id = ?"
);

if (!$stmt) {
    $_SESSION["resume_message"] = "Unable to prepare the summary update.";
    $_SESSION["resume_message_type"] = "danger";
    header("Location: resume.php");
    exit;
}

mysqli_stmt_bind_param($stmt, "si", $slogan, $user_id);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION["resume_message"] = "Resume summary updated successfully.";
    $_SESSION["resume_message_type"] = "success";
} else {
    $_SESSION["resume_message"] = "Failed to update the resume summary.";
    $_SESSION["resume_message_type"] = "danger";
}

mysqli_stmt_close($stmt);

header("Location: resume.php");
exit;
?>
