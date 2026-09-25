<?php

    include '../include/config.php';
    include 'quote-functions.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: about.php");
        exit;
    }

    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    $name = trim($_POST['name'] ?? '');
    $title = trim($_POST['title'] ?? '');
    $company = trim($_POST['company'] ?? '');
    $quote = trim($_POST['quote'] ?? '');

    if ($id <= 0) {
        $_SESSION['error'] = "Invalid testimonial.";

        header("Location: about.php");
        exit;
    }

    if ($name === '' || $quote === '') {
        $_SESSION['error'] = "Client name and testimonial are required.";

        header("Location: edit-quote.php?id=" . $id);
        exit;
    }

    /* Get existing testimonial */
    $sql = "SELECT * FROM quotes WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $existing = mysqli_fetch_assoc($result);

    if (!$existing) {
        $_SESSION['error'] = "Testimonial not found.";

        header("Location: about.php");
        exit;
    }

    $oldImage = $existing['img'];
    $newImage = $oldImage;

    /* Check whether a new image was uploaded */
    if (isset($_FILES['img']) && $_FILES['img']['error'] !== UPLOAD_ERR_NO_FILE) {

        if ($_FILES['img']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = "There was a problem uploading the image.";

            header("Location: edit-quote.php?id=" . $id);
            exit;
        }

        /* Maximum 2MB */
        if ($_FILES['img']['size'] > 2 * 1024 * 1024) {
            $_SESSION['error'] = "Image must not be larger than 2MB.";

            header("Location: edit-quote.php?id=" . $id);
            exit;
        }

        /* Validate MIME type */
        $allowedTypes = [
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/gif'  => 'gif',
            'image/webp' => 'webp'
        ];

        $fileType = mime_content_type($_FILES['img']['tmp_name']);

        if (!array_key_exists($fileType, $allowedTypes)) {
            $_SESSION['error'] = "Only JPG, PNG, GIF and WEBP images are allowed.";

            header("Location: edit-quote.php?id=" . $id);
            exit;
        }

        /* Upload directory */
        $uploadDir = '../uploads/quotes/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        /* Generate new filename */
        $extension = $allowedTypes[$fileType];

        $fileName =
            'quote_' .
            time() .
            '_' .
            bin2hex(random_bytes(5)) .
            '.' .
            $extension;

        $destination = $uploadDir . $fileName;


        if (!move_uploaded_file($_FILES['img']['tmp_name'], $destination)) {
            $_SESSION['error'] = "Unable to save the new image.";

            header("Location: edit-quote.php?id=" . $id);
            exit;
        }

        /* Store root-relative path */
        $newImage = 'uploads/quotes/' . $fileName;
    }

    /* Update database */
    $sql = "UPDATE quotes
            SET img = ?, name = ?, title = ?, company = ?, quote = ?
            WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        $_SESSION['error'] = "Database error.";

        header("Location: edit-quote.php?id=" . $id);
        exit;
    }


    mysqli_stmt_bind_param(
        $stmt, "sssssi",
        $newImage, $name, $title, $company, $quote, $id
    );

    if (mysqli_stmt_execute($stmt)) {

        /* Delete old uploaded image ONLY after successful update. */
        if (
            !empty($oldImage) &&
            $oldImage !== $newImage &&
            isQuoteUploadedImage($oldImage)
        ) {

            $oldFile = '../' . ltrim($oldImage, '/');

            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }
        $_SESSION['success'] = "Testimonial updated successfully.";

        header("Location: about.php");
        exit;

    } else {

        /* If database update fails, remove newly uploaded image. */
        if (
            $newImage !== $oldImage &&
            !empty($newImage) &&
            isQuoteUploadedImage($newImage)
        ) {

            $newFile = '../' . ltrim($newImage, '/');

            if (file_exists($newFile)) {
                unlink($newFile);
            }
        }
        $_SESSION['error'] = "Unable to update testimonial.";

        header("Location: edit-quote.php?id=" . $id);
        exit;
    }

?>