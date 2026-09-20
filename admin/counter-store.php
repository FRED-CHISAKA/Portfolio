<?php

    include "../include/config.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: add-counter.php");
        exit;
    }

    $icon  = trim($_POST["icon"] ?? "");
    $title = trim($_POST["title"] ?? "");
    $pre   = trim($_POST["pre"] ?? "");
    $post  = trim($_POST["post"] ?? "");

    // Validate required fields
    if ($icon === "" || $title === "") {
        header("Location: add-counter.php?error=required");
        exit;
    }

    $sql = "INSERT INTO counter (icon, title, pre, post)
            VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        header("Location: add-counter.php?error=database");
        exit;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "ssss",
        $icon,
        $title,
        $pre,
        $post
    );

    if (mysqli_stmt_execute($stmt)) {

        mysqli_stmt_close($stmt);
        header("Location: about.php?success=statistic_added");
        exit;

    } else {

        mysqli_stmt_close($stmt);
        header("Location: add-counter.php?error=failed");
        exit;
    }
?>