<?php

include "../include/config.php";

/*
|--------------------------------------------------------------------------
| Check Message ID
|--------------------------------------------------------------------------
*/
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: contact.php");
    exit;
}

$id = intval($_GET['id']);


/*
|--------------------------------------------------------------------------
| Check Requested Status
|--------------------------------------------------------------------------
*/
if (!isset($_GET['status']) || !is_numeric($_GET['status'])) {
    header("Location: contact.php");
    exit;
}

$status = intval($_GET['status']);


/*
|--------------------------------------------------------------------------
| Only Allow Valid Status Values
|--------------------------------------------------------------------------
*/
if ($status !== 0 && $status !== 1) {
    header("Location: contact.php");
    exit;
}


/*
|--------------------------------------------------------------------------
| Check If Message Exists
|--------------------------------------------------------------------------
*/
$check_sql = "SELECT id FROM contact WHERE id = $id LIMIT 1";
$check_result = mysqli_query($conn, $check_sql);

if (!$check_result || mysqli_num_rows($check_result) == 0) {
    header("Location: contact.php");
    exit;
}


/*
|--------------------------------------------------------------------------
| Update Message Status
|--------------------------------------------------------------------------
*/
$update_sql = "UPDATE contact
               SET status = $status
               WHERE id = $id";

if (mysqli_query($conn, $update_sql)) {

    header("Location: contact.php");
    exit;

} else {

    echo "Error updating message status: " . mysqli_error($conn);
}

?>