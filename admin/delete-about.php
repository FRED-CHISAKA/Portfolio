<?php

    include "../include/config.php";

    /* Check ID */
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("Location: about.php?error=invalid");
        exit;
    }

    $id = (int) $_GET['id'];

    /* Check record exists */
    $sql = "SELECT id FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 0) {
        header("Location: about.php?error=notfound");
        exit;
    }

    /* Delete */
    $delete_sql = "DELETE FROM users WHERE id = ?";
    $delete_stmt = mysqli_prepare($conn, $delete_sql);

    mysqli_stmt_bind_param(
        $delete_stmt,
        "i",
        $id
    );

    if (mysqli_stmt_execute($delete_stmt)) {
        header("Location: about.php?success=deleted");
        exit;

    } else {
        header("Location: about.php?error=delete");
        exit;
    }

?>