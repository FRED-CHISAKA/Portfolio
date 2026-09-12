<?php

include "../include/config.php";


if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: about.php");
    exit;
}


/* Get ID */

$id = isset($_POST['id']) ? (int) $_POST['id'] : 0;


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

$freelance = isset($_POST['freelance'])
    ? (int) $_POST['freelance']
    : 0;


/* Validation */

if ($id <= 0 || $name === '' || $title === '') {

    header("Location: about.php?error=invalid");
    exit;
}


/* Update */

$sql = "UPDATE users SET
            name = ?,
            title = ?,
            slogan = ?,
            email = ?,
            phone = ?,
            website = ?,
            city = ?,
            birthday = ?,
            age = ?,
            degree = ?,
            certification = ?,
            freelance = ?
        WHERE id = ?";


$stmt = mysqli_prepare($conn, $sql);


mysqli_stmt_bind_param(
    $stmt,
    "ssssssssissii",
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
    $freelance,
    $id
);


if (mysqli_stmt_execute($stmt)) {

    header("Location: about.php?success=updated");
    exit;

} else {

    header("Location: edit-about.php?id=$id&error=database");
    exit;
}

?>