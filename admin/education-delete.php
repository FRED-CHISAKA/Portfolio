<?php
    require_once "crud-helper.php";

    $id = require_id();

    $sql = "DELETE FROM education WHERE id = ? AND user_id = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        redirect_resume("Unable to delete the education record.", "danger");
    }

    mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        redirect_resume("Education deleted successfully.");
    }

    $error = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);

    redirect_resume($error ?: "Unable to delete the education record.", "danger");
?>
