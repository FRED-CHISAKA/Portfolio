<?php

include "../include/config.php";

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: services.php");
    exit();
}

// Get service ID
$id = intval($_POST['id'] ?? 0);

// Validate ID
if ($id <= 0) {
    header("Location: services.php?error=Invalid service ID");
    exit();
}

// Delete service
$stmt = $conn->prepare("
    DELETE FROM services
    WHERE id = ?
");

if (!$stmt) {
    header("Location: services.php?error=Database error");
    exit();
}

$stmt->bind_param("i", $id);

if ($stmt->execute()) {

    if ($stmt->affected_rows > 0) {

        $stmt->close();

        header("Location: services.php?success=Service deleted successfully");
        exit();

    } else {

        $stmt->close();

        header("Location: services.php?error=Service not found");
        exit();
    }

} else {

    $stmt->close();

    header("Location: services.php?error=Failed to delete service");
    exit();
}

?>