<?php

include "../include/config.php";

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: services.php");
    exit();
}

// Get form data
$title = trim($_POST['title'] ?? '');
$icon = trim($_POST['icon'] ?? '');
$url = trim($_POST['url'] ?? '');
$description = trim($_POST['description'] ?? '');

// Validate required fields
if (empty($title) || empty($icon) || empty($url) || empty($description)) {
    header("Location: services.php?error=Please fill in all required fields");
    exit();
}

// Insert service
$stmt = $conn->prepare("
    INSERT INTO services (url, icon, title, description)
    VALUES (?, ?, ?, ?)
");

if (!$stmt) {
    header("Location: services.php?error=Database error");
    exit();
}

$stmt->bind_param(
    "ssss",
    $url,
    $icon,
    $title,
    $description
);

if ($stmt->execute()) {
    $stmt->close();

    header("Location: services.php?success=Service added successfully");
    exit();
} else {
    $stmt->close();

    header("Location: services.php?error=Failed to add service");
    exit();
}
?>