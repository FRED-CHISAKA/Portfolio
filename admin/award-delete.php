<?php
require_once "crud-helper.php";

$id = require_id();

$sql = "DELETE FROM awards WHERE id = ? LIMIT 1";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    redirect_resume("Unable to delete the award record.", "danger");
}

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);
    redirect_resume("Achievement deleted successfully.");
}

$error = mysqli_stmt_error($stmt);
mysqli_stmt_close($stmt);

redirect_resume($error ?: "Unable to delete the award record.", "danger");
?>
