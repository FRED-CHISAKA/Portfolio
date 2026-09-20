<?php

    include "../include/config.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: about.php");
        exit;
    }

    $id    = $_POST["id"] ?? "";
    $icon  = trim($_POST["icon"] ?? "");
    $title = trim($_POST["title"] ?? "");
    $color = trim($_POST["color"] ?? "");

    /* Validate ID */
    if (!is_numeric($id)) {
        header("Location: about.php?error=invalid_id");
        exit;
    }

    $id = (int) $id;

    /* Validate Required Fields */
    if ($icon === "" || $title === "") {
        header("Location: edit-skill.php?id=" . $id . "&error=required");
        exit;
    }

    /* Update Skill */
    $sql = "UPDATE skills
            SET icon = ?,
                title = ?,
                color = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        header("Location: edit-skill.php?id=" . $id . "&error=database");
        exit;
    }

    mysqli_stmt_bind_param(
        $stmt,
        "sssi",
        $icon,
        $title,
        $color,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);

        header("Location: about.php?success=skill_updated");
        exit;

    } else {
        mysqli_stmt_close($stmt);

        header("Location: edit-skill.php?id=" . $id . "&error=failed");
        exit;
    }

?>