<?php

    include "../include/config.php";

    /* Check Message ID */
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("Location: contact.php");
        exit;
    }

    $id = intval($_GET['id']);

    /* Check If Message Exists */
    $check_sql = "SELECT id FROM contact WHERE id = $id LIMIT 1";
    $check_result = mysqli_query($conn, $check_sql);

    if (!$check_result || mysqli_num_rows($check_result) == 0) {
        header("Location: contact.php");
        exit;
    }

    /* Delete Message */
    $delete_sql = "DELETE FROM contact WHERE id = $id";

    if (mysqli_query($conn, $delete_sql)) {

        header("Location: contact.php");
        exit;

    } else {

        echo "Error deleting message: " . mysqli_error($conn);
    }

?>