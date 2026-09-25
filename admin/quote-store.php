<?php

    include '../include/config.php';

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header("Location: quotes.php");
        exit;
    }

    /* Collect form data */
    $name = trim($_POST['name'] ?? '');
    $title = trim($_POST['title'] ?? '');
    $company = trim($_POST['company'] ?? '');
    $quote = trim($_POST['quote'] ?? '');

    /* Validate required fields */
    if ($name === '' || $quote === '') {
        $_SESSION['error'] = "Client name and testimonial are required.";

        header("Location: add-quote.php");
        exit;
    }

    /* Image upload */
    $imagePath = '';

    if (isset($_FILES['img']) && $_FILES['img']['error'] !== UPLOAD_ERR_NO_FILE) {

        if ($_FILES['img']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['error'] = "There was a problem uploading the image.";

            header("Location: add-quote.php");
            exit;
        }

        /* Maximum size: 2MB */
        if ($_FILES['img']['size'] > 2 * 1024 * 1024) {
            $_SESSION['error'] = "Image must not be larger than 2MB.";

            header("Location: add-quote.php");
            exit;
        }

        /* Validate image type */
        $allowedTypes = [
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/gif'  => 'gif',
            'image/webp' => 'webp'
        ];

        $fileType = mime_content_type($_FILES['img']['tmp_name']);

        if (!array_key_exists($fileType, $allowedTypes)) {
            $_SESSION['error'] = "Only JPG, PNG, GIF and WEBP images are allowed.";

            header("Location: add-quote.php");
            exit;
        }

        /* Create upload folder if it doesn't exist */
        $uploadDir = '../uploads/quotes/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        /* Generate unique filename */
        $extension = $allowedTypes[$fileType];

        $fileName = 'quote_' . time() . '_' . bin2hex(random_bytes(5)) . '.' . $extension;

        $destination = $uploadDir . $fileName;

        /* Move uploaded file */
        if (!move_uploaded_file($_FILES['img']['tmp_name'], $destination)) {
            $_SESSION['error'] = "Unable to save the uploaded image.";

            header("Location: add-quote.php");
            exit;
        }

        /* Store a project-root-relative path in the database. */
        $imagePath = 'uploads/quotes/' . $fileName;
    }

    /* Insert testimonial */
    $sql = "INSERT INTO quotes (img, name, title, company, quote)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        $_SESSION['error'] = "Database error: " . mysqli_error($conn);

        header("Location: add-quote.php");
        exit;
    }

    mysqli_stmt_bind_param(
        $stmt, "sssss",
        $imagePath, $name, $title, $company, $quote
    );

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['success'] = "Testimonial added successfully.";

        header("Location: about.php?id=");
        exit;

    } else {

        /* If database insertion fails after an image was uploaded, remove that newly uploaded image. */
        if (!empty($imagePath) && file_exists('../' . $imagePath)) {
            unlink('../' . $imagePath);
        }
        $_SESSION['error'] = "Unable to save testimonial.";

        header("Location: add-quote.php");
        exit;
    }

?>