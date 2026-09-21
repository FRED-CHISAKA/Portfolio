<?php

    include "../include/config.php";

    /* Get Certification ID */
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("Location: certifications.php");
        exit;
    }

    $id = (int)$_GET['id'];

    /* Get Certification */
    $sql = "SELECT * FROM certifications WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "i",
        $id
    );

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $certification = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);


    /* Certification Does Not Exist */
    if (!$certification) {
        header("Location: certifications.php?error=notfound");
        exit;
    }

    /* Delete Certification */
    $sql = "DELETE FROM certifications WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);

        /* Delete Associated File */
        if (!empty($certification['img'])) {

            $file_path =
                "../" .
                $certification['img'];

            /* Make Sure It Is A Local File */
            if (
                file_exists($file_path) &&
                is_file($file_path)
            ) {
                unlink($file_path);
            }
        }

        /* Redirect */
        header(
            "Location: certifications.php?success=deleted"
        );
        exit;

    } else {

        mysqli_stmt_close($stmt);
        header(
            "Location: certifications.php?error=delete_failed"
        );

        exit;
    }
?>