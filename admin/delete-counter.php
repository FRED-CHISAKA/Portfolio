<?php

    include "../include/config.php";

    /* Validate ID */
    if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
        header("Location: about.php?error=invalid_id");
        exit;
    }

    $id = (int) $_GET["id"];

    /* Delete Statistic */
    $sql = "DELETE FROM counter WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        header("Location: about.php?error=database");
        exit;
    }

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_close($stmt);
        header("Location: about.php?success=statistic_deleted");
        exit;

    } else {

        mysqli_stmt_close($stmt);
        header("Location: about.php?error=delete_failed");
        exit;
    }

?>