<?php

    include "../include/config.php";

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: add-about.php");
        exit;
    }

    /* Get form data */
    $name = trim($_POST['name'] ?? '');
    $title = trim($_POST['title'] ?? '');
    $slogan = trim($_POST['slogan'] ?? '');

    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $website = trim($_POST['website'] ?? '');
    $city = trim($_POST['city'] ?? '');

    $birthday = trim($_POST['birthday'] ?? '');
    $age = trim($_POST['age'] ?? '');
    $degree = trim($_POST['degree'] ?? '');
    $certification = trim($_POST['certification'] ?? '');

    $freelance = isset($_POST['freelance']) ? (int) $_POST['freelance'] : 0;

    /* Check required fields */
    if ($name === '' || $title === '') {

        header("Location: add-about.php?error=required");
        exit;
    }

    /* Check if an About profile already exists */
    $check_sql = "SELECT id FROM users LIMIT 1";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        header("Location: about.php?error=exists");
        exit;
    }

    /* Insert */
    $sql = "INSERT INTO users
    (
        name,
        title,
        slogan,
        email,
        phone,
        website,
        city,
        birthday,
        age,
        degree,
        certification,
        freelance
    )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssissi",
        $name,
        $title,
        $slogan,
        $email,
        $phone,
        $website,
        $city,
        $birthday,
        $age,
        $degree,
        $certification,
        $freelance
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: about.php?success=added");
        exit;

    } else {
        header("Location: add-about.php?error=database");
        exit;
    }

?>