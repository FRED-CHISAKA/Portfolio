<?php

    include "../include/config.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: add-quote.php");
        exit;
    }

    $img     = trim($_POST["img"] ?? "");
    $name    = trim($_POST["name"] ?? "");
    $title   = trim($_POST["title"] ?? "");
    $company = trim($_POST["company"] ?? "");
    $quote   = trim($_POST["quote"] ?? "");

    /* Validate Required Fields */

    if ($name === "" || $quote === "") {
        header("Location: add-quote.php?error=required");
        exit;
    }

    /* Insert Testimonial */
    $sql = "INSERT INTO quotes (img, name, title, company, quote)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        header("Location: add-quote.php?error=database");
        exit;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $img,
        $name,
        $title,
        $company,
        $quote
    );

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        header("Location: about.php?success=testimonial_added");
        exit;

    } else {

        mysqli_stmt_close($stmt);
        header("Location: add-quote.php?error=failed");
        exit;
    }

?>
