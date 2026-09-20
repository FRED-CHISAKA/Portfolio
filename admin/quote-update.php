<?php

    include "../include/config.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: about.php");
        exit;
    }

    $id      = $_POST["id"] ?? "";
    $img     = trim($_POST["img"] ?? "");
    $name    = trim($_POST["name"] ?? "");
    $title   = trim($_POST["title"] ?? "");
    $company = trim($_POST["company"] ?? "");
    $quote   = trim($_POST["quote"] ?? "");

    /* Validate ID */
    if (!is_numeric($id)) {
        header("Location: about.php?error=invalid_id");
        exit;
    }

    $id = (int) $id;

    /* Validate Required Fields */

    if ($name === "" || $quote === "") {
        header(
            "Location: edit-quote.php?id=" .
            $id .
            "&error=required"
        );
        exit;
    }

    /* Update Testimonial */
    $sql = "UPDATE quotes
            SET img = ?,
                name = ?,
                title = ?,
                company = ?,
                quote = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        header(
            "Location: edit-quote.php?id=" .
            $id .
            "&error=database"
        );
        exit;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssssi",
        $img,
        $name,
        $title,
        $company,
        $quote,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);

        header("Location: about.php?success=testimonial_updated");
        exit;

    } else {

        mysqli_stmt_close($stmt);

        header(
            "Location: edit-quote.php?id=" .
            $id .
            "&error=failed"
        );
        exit;
    }

?>