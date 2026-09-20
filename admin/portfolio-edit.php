<?php

include "../include/config.php";
include "header.php";
include "sidebar.php";

$error = "";
$message = "";


/* ==========================================
   GET PROJECT ID
========================================== */

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {

    header("Location: portfolio.php");
    exit();

}

$id = intval($_GET['id']);


/* ==========================================
   GET EXISTING PROJECT
========================================== */

$project_sql = "
    SELECT *
    FROM portfolio
    WHERE id = '$id'
    LIMIT 1
";

$project_result = mysqli_query($conn, $project_sql);


if (!$project_result || mysqli_num_rows($project_result) == 0) {

    header("Location: portfolio.php");
    exit();

}

$project = mysqli_fetch_assoc($project_result);


/* ==========================================
   GET CATEGORIES
========================================== */

$category_sql = "
    SELECT *
    FROM portfolio
    ORDER BY title ASC
";

$category_result = mysqli_query($conn, $category_sql);


/* ==========================================
   UPDATE PROJECT
========================================== */

if (isset($_POST['update_portfolio'])) {

    $title = mysqli_real_escape_string(
        $conn,
        trim($_POST['title'])
    );

    $description = mysqli_real_escape_string(
        $conn,
        trim($_POST['description'])
    );

    $category = intval($_POST['category']);

    $technology = mysqli_real_escape_string(
        $conn,
        trim($_POST['technology'])
    );

    $url = mysqli_real_escape_string(
        $conn,
        trim($_POST['url'])
    );


    /* ==========================================
       VALIDATION
    ========================================== */

    if (empty($title)) {

        $error = "Project title is required.";

    } elseif (empty($description)) {

        $error = "Project description is required.";

    } elseif ($category <= 0) {

        $error = "Please select a category.";

    } elseif (empty($technology)) {

        $error = "Technology is required.";

    } else {


        /* ==========================================
           KEEP EXISTING IMAGE
        ========================================== */

        $database_image_path = $project['img'];

        $old_image_path = "../" . $project['img'];

        $new_uploaded_image = false;

        $new_image_full_path = "";


        /* ==========================================
           CHECK FOR NEW IMAGE
        ========================================== */

        if (
            isset($_FILES['img']) &&
            $_FILES['img']['error'] != UPLOAD_ERR_NO_FILE
        ) {

            $upload_directory = "../assets/img/portfolio/";


            if (!is_dir($upload_directory)) {

                mkdir($upload_directory, 0777, true);

            }


            $image_name =
                $_FILES['img']['name'];

            $image_tmp =
                $_FILES['img']['tmp_name'];

            $image_size =
                $_FILES['img']['size'];

            $image_error =
                $_FILES['img']['error'];


            $image_extension =
                strtolower(
                    pathinfo(
                        $image_name,
                        PATHINFO_EXTENSION
                    )
                );


            $allowed_extensions = [
                'jpg',
                'jpeg',
                'png',
                'gif',
                'webp'
            ];


            if (
                !in_array(
                    $image_extension,
                    $allowed_extensions
                )
            ) {

                $error =
                    "Invalid image format. Allowed: JPG, JPEG, PNG, GIF and WEBP.";

            } elseif ($image_size > 5 * 1024 * 1024) {

                $error =
                    "Image size must not exceed 5MB.";

            } elseif ($image_error !== UPLOAD_ERR_OK) {

                $error =
                    "There was an error uploading the image.";

            } else {


                /* Generate new filename */

                $new_image_name =
                    "portfolio_" .
                    time() .
                    "_" .
                    uniqid() .
                    "." .
                    $image_extension;


                $new_image_full_path =
                    $upload_directory .
                    $new_image_name;


                if (
                    move_uploaded_file(
                        $image_tmp,
                        $new_image_full_path
                    )
                ) {

                    $database_image_path =
                        "assets/img/portfolio/" .
                        $new_image_name;

                    $new_uploaded_image = true;

                } else {

                    $error =
                        "Failed to upload the new image.";

                }

            }

        }


        /* ==========================================
           UPDATE DATABASE
        ========================================== */

        if (empty($error)) {

            $update_sql = "
                UPDATE portfolio
                SET
                    title = '$title',
                    description = '$description',
                    category = '$category',
                    technology = '$technology',
                    url = '$url',
                    img = '$database_image_path'
                WHERE id = '$id'
            ";


            if (mysqli_query($conn, $update_sql)) {


                /* ==========================================
                   DELETE OLD IMAGE
                ========================================== */

                if (
                    $new_uploaded_image &&
                    !empty($project['img']) &&
                    file_exists($old_image_path)
                ) {

                    unlink($old_image_path);

                }


                $message =
                    "Portfolio project updated successfully.";


                /* Reload updated project */

                $project_result = mysqli_query(
                    $conn,
                    $project_sql
                );

                $project =
                    mysqli_fetch_assoc(
                        $project_result
                    );


            } else {


                /* Delete newly uploaded image if update fails */

                if (
                    $new_uploaded_image &&
                    file_exists($new_image_full_path)
                ) {

                    unlink($new_image_full_path);

                }


                $error =
                    "Failed to update project: " .
                    mysqli_error($conn);

            }

        }

    }

}

?>

<!-- Main Content -->

<div class="page-wrapper">

    <div class="content">

        <!-- Page Header -->

        <div class="row">

            <div class="col-sm-8 col-8">

                <h4 class="page-title">
                    Edit Portfolio Project
                </h4>

            </div>

            <div class="col-sm-4 col-4 text-right">

                <a
                    href="portfolio.php"
                    class="btn btn-secondary btn-rounded"
                >

                    <i class="fa fa-arrow-left"></i>

                    Back to Portfolio

                </a>

            </div>

        </div>


        <!-- Success -->

        <?php if (!empty($message)) { ?>

            <div class="alert alert-success alert-dismissible fade show">

                <strong>Success!</strong>
                <?= htmlspecialchars($message) ?>

                <button
                    type="button"
                    class="close"
                    data-dismiss="alert"
                >
                    <span>&times;</span>
                </button>

            </div>

        <?php } ?>


        <!-- Error -->

        <?php if (!empty($error)) { ?>

            <div class="alert alert-danger alert-dismissible fade show">

                <strong>Error!</strong>
                <?= htmlspecialchars($error) ?>

                <button
                    type="button"
                    class="close"
                    data-dismiss="alert"
                >
                    <span>&times;</span>
                </button>

            </div>

        <?php } ?>


        <!-- Form -->

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bi bi-pencil-square me-2"></i>

                    Edit Project Information

                </h5>

            </div>


            <div class="card-body">

                <form
                    method="POST"
                    enctype="multipart/form-data"
                >

                    <div class="row">


                        <!-- Title -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Project Title
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    class="form-control"
                                    value="<?= htmlspecialchars($project['title']) ?>"
                                    required
                                >

                            </div>

                        </div>


                        <!-- Category -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Category
                                    <span class="text-danger">*</span>
                                </label>

                                <select
                                    name="category"
                                    class="form-control"
                                    required
                                >

                                    <option value="">
                                        Select Category
                                    </option>

                                    <?php

                                    if (
                                        $category_result &&
                                        mysqli_num_rows($category_result) > 0
                                    ) {

                                        while (
                                            $category =
                                            mysqli_fetch_assoc(
                                                $category_result
                                            )
                                        ) {

                                    ?>

                                        <option
                                            value="<?= $category['id'] ?>"
                                            <?= (
                                                $project['category']
                                                == $category['id']
                                            )
                                                ? 'selected'
                                                : ''
                                            ?>
                                        >

                                            <?= htmlspecialchars(
                                                $category['title']
                                            ) ?>

                                        </option>

                                    <?php

                                        }

                                    }

                                    ?>

                                </select>

                            </div>

                        </div>


                        <!-- Technology -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Technology
                                    <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="technology"
                                    class="form-control"
                                    value="<?= htmlspecialchars($project['technology']) ?>"
                                    required
                                >

                            </div>

                        </div>


                        <!-- URL -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Project URL
                                </label>

                                <input
                                    type="url"
                                    name="url"
                                    class="form-control"
                                    value="<?= htmlspecialchars($project['url']) ?>"
                                    placeholder="https://example.com"
                                >

                            </div>

                        </div>


                        <!-- Description -->

                        <div class="col-md-12">

                            <div class="form-group">

                                <label>
                                    Project Description
                                    <span class="text-danger">*</span>
                                </label>

                                <textarea
                                    name="description"
                                    rows="5"
                                    class="form-control"
                                    required
                                ><?= htmlspecialchars($project['description']) ?></textarea>

                            </div>

                        </div>


                        <!-- Existing Image -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Current Image
                                </label>

                                <div class="border rounded p-3">

                                    <?php if (!empty($project['img'])) { ?>

                                        <img
                                            src="../<?= htmlspecialchars($project['img']) ?>"
                                            alt="<?= htmlspecialchars($project['title']) ?>"
                                            class="img-fluid rounded"
                                            style="max-height: 220px;"
                                        >

                                    <?php } else { ?>

                                        <div class="text-muted py-4 text-center">

                                            <i class="bi bi-image fs-1"></i>

                                            <p class="mb-0">
                                                No image available
                                            </p>

                                        </div>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>


                        <!-- New Image -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Replace Image
                                </label>

                                <input
                                    type="file"
                                    name="img"
                                    class="form-control"
                                    accept="image/jpeg,image/png,image/gif,image/webp"
                                >

                                <small class="text-muted">

                                    Leave empty to keep the current image.

                                    <br>

                                    JPG, JPEG, PNG, GIF or WEBP.
                                    Maximum 5MB.

                                </small>

                            </div>

                        </div>


                    </div>


                    <!-- Buttons -->

                    <div class="text-right mt-4">

                        <a
                            href="portfolio.php"
                            class="btn btn-secondary"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            name="update_portfolio"
                            class="btn btn-primary"
                        >

                            <i class="bi bi-save me-1"></i>

                            Update Portfolio

                        </button>

                    </div>


                </form>

            </div>

        </div>

    </div>

</div>


<?php

include "footer.php";

?>