<?php

    include "../include/config.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: add-skill.php");
        exit;
    }

    $icon  = trim($_POST["icon"] ?? "");
    $title = trim($_POST["title"] ?? "");
    $color = trim($_POST["color"] ?? "");

    /* Validate Required Fields */
    if ($icon === "" || $title === "") {
        header("Location: add-skill.php?error=required");
        exit;
    }

    /* Insert Skill */
    $sql = "INSERT INTO skills (icon, title, color)
            VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        header("Location: add-skill.php?error=database");
        exit;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sss",
        $icon,
        $title,
        $color
    );

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);

        header("Location: about.php?success=skill_added");
        exit;

    } else {
        mysqli_stmt_close($stmt);

        header("Location: add-skill.php?error=failed");
        exit;
    }

?>