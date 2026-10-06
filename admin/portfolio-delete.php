<?php

include "../include/config.php";


/* =========================================================
   CHECK PROJECT ID
========================================================= */

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {

    header("Location: portfolio.php");
    exit();

}

$id = intval($_GET['id']);


/* =========================================================
   GET PROJECT
========================================================= */

$project_sql = "
    SELECT *
    FROM portfolio
    WHERE id = '$id'
    LIMIT 1
";

$project_result = mysqli_query(
    $conn,
    $project_sql
);


if (
    !$project_result ||
    mysqli_num_rows($project_result) == 0
) {

    header("Location: portfolio.php?deleted=notfound");
    exit();

}


$project = mysqli_fetch_assoc($project_result);


/* =========================================================
   SAVE IMAGE PATH BEFORE DELETING DATABASE RECORD
========================================================= */

$image_path = "";

if (!empty($project['img'])) {

    $image_path = "../" . $project['img'];

}


/* =========================================================
   DELETE DATABASE RECORD
========================================================= */

$delete_sql = "
    DELETE FROM portfolio
    WHERE id = '$id'
";


if (mysqli_query($conn, $delete_sql)) {


    /* =====================================================
       DELETE PORTFOLIO IMAGE FROM SERVER
    ===================================================== */

    if (!empty($image_path)) {


        /* Check that the file actually exists */

        if (file_exists($image_path)) {


            /* Delete the image */

            if (!unlink($image_path)) {

                /*
                 * Database record was deleted,
                 * but image could not be deleted.
                 */

                header(
                    "Location: portfolio.php?deleted=image_error"
                );

                exit();

            }

        }

    }


    /* =====================================================
       SUCCESS
    ===================================================== */

    header(
        "Location: portfolio.php?deleted=success"
    );

    exit();


} else {


    /* =====================================================
       DATABASE DELETE FAILED
    ===================================================== */

    header(
        "Location: portfolio.php?deleted=error"
    );

    exit();

}

?>
