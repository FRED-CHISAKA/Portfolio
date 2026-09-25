<?php

include '../include/config.php';
include 'quote-functions.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {

    header("Location: about.php");
    exit;
}

$id = (int) $_GET['id'];

/* Get testimonial */
$sql = "SELECT img FROM quotes WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$quote = mysqli_fetch_assoc($result);

if (!$quote) {

    $_SESSION['error'] = "Testimonial not found.";

    header("Location: about.php");
    exit;
}

$image = $quote['img'];

/* Delete database record */
$sql = "DELETE FROM quotes WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {

    /* Delete image only if it was uploaded through testimonials. */
    if (
        !empty($image) &&
        isQuoteUploadedImage($image)
    ) {

        $imageFile = '../' . ltrim($image, '/');

        if (file_exists($imageFile)) {
            unlink($imageFile);
        }
    }

    $_SESSION['success'] = "Testimonial deleted successfully.";

} else {

    $_SESSION['error'] = "Unable to delete testimonial.";
}

header("Location: about.php");
exit;

?>