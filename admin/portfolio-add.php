<?php

include "../include/config.php";
include "header.php";
include "sidebar.php";


$message = "";
$error = "";


/* =========================================================
   GET PORTFOLIO CATEGORIES
========================================================= */

$category_sql = "
    SELECT id, class, name
    FROM category
    ORDER BY id ASC
";

$category_result = mysqli_query($conn, $category_sql);


/* =========================================================
   ADD PORTFOLIO PROJECT
========================================================= */

if (isset($_POST['add_portfolio'])) {

    /* -----------------------------------------------------
       GET FORM DATA
    ----------------------------------------------------- */

    $title = mysqli_real_escape_string(
        $conn,
        trim($_POST['title'] ?? '')
    );

    $description = mysqli_real_escape_string(
        $conn,
        trim($_POST['description'] ?? '')
    );

    $category = intval($_POST['category'] ?? 0);

    $technology = mysqli_real_escape_string(
        $conn,
        trim($_POST['technology'] ?? '')
    );

    $url = mysqli_real_escape_string(
        $conn,
        trim($_POST['url'] ?? '')
    );


    /* =====================================================
       VALIDATION
    ===================================================== */

    if (empty($title)) {

        $error = "Project title is required.";

    } elseif (empty($description)) {

        $error = "Project description is required.";

    } elseif ($category <= 0) {

        $error = "Please select a category.";

    } elseif (empty($technology)) {

        $error = "Technology is required.";

    } elseif (
        !isset($_FILES['img']) ||
        $_FILES['img']['error'] == UPLOAD_ERR_NO_FILE
    ) {

        $error = "Please select a portfolio image.";

    } else {


        /* =================================================
           VERIFY CATEGORY EXISTS
        ================================================= */

        $category_check_sql = "
            SELECT id
            FROM category
            WHERE id = '$category'
            LIMIT 1
        ";

        $category_check_result =
            mysqli_query($conn, $category_check_sql);


        if (
            !$category_check_result ||
            mysqli_num_rows($category_check_result) === 0
        ) {

            $error = "The selected category does not exist.";

        } else {


            /* =============================================
               IMAGE UPLOAD
            ============================================= */

            $upload_directory = "../assets/img/portfolio/";


            /* Create directory if it does not exist */

            if (!is_dir($upload_directory)) {

                mkdir($upload_directory, 0777, true);

            }


            /* Get uploaded image information */

            $image_name = $_FILES['img']['name'];

            $image_tmp = $_FILES['img']['tmp_name'];

            $image_size = $_FILES['img']['size'];

            $image_error = $_FILES['img']['error'];


            /* Get extension */

            $image_extension = strtolower(
                pathinfo(
                    $image_name,
                    PATHINFO_EXTENSION
                )
            );


            /* Allowed image types */

            $allowed_extensions = [
                'jpg',
                'jpeg',
                'png',
                'gif',
                'webp'
            ];


            /* =============================================
               IMAGE VALIDATION
            ============================================= */

            if (
                !in_array(
                    $image_extension,
                    $allowed_extensions
                )
            ) {

                $error =
                    "Invalid image format. Allowed: JPG, JPEG, PNG, GIF and WEBP.";

            } elseif (
                $image_size > 5 * 1024 * 1024
            ) {

                $error =
                    "Image size must not exceed 5MB.";

            } elseif (
                $image_error !== UPLOAD_ERR_OK
            ) {

                $error =
                    "There was an error uploading the image.";

            } else {


                /* =========================================
                   GENERATE UNIQUE IMAGE NAME
                ========================================= */

                $new_image_name =
                    "portfolio_" .
                    time() .
                    "_" .
                    uniqid() .
                    "." .
                    $image_extension;


                $image_path =
                    $upload_directory .
                    $new_image_name;


                /* =========================================
                   MOVE IMAGE
                ========================================= */

                if (
                    move_uploaded_file(
                        $image_tmp,
                        $image_path
                    )
                ) {


                    /* Database image path */

                    $database_image_path =
                        "assets/img/portfolio/" .
                        $new_image_name;


                    /* =====================================
                       INSERT PORTFOLIO PROJECT
                    ===================================== */

                    $insert_sql = "
                        INSERT INTO portfolio
                        (
                            title,
                            description,
                            category,
                            technology,
                            url,
                            img
                        )
                        VALUES
                        (
                            '$title',
                            '$description',
                            '$category',
                            '$technology',
                            '$url',
                            '$database_image_path'
                        )
                    ";


                    if (
                        mysqli_query(
                            $conn,
                            $insert_sql
                        )
                    ) {

                        $message =
                            "Portfolio project added successfully.";

                    } else {


                        /* Delete uploaded image if
                           database insert fails */

                        if (
                            file_exists($image_path)
                        ) {

                            unlink($image_path);

                        }


                        $error =
                            "Failed to add portfolio project: " .
                            mysqli_error($conn);
                    }


                } else {

                    $error =
                        "Failed to upload the portfolio image.";

                }

            }

        }

    }

}

?>


<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<div class="page-wrapper">

    <div class="content">


        <!-- =================================================
             PAGE HEADER
        ================================================== -->

        <div class="row">

            <div class="col-sm-8 col-8">

                <h4 class="page-title">
                    Add Portfolio Project
                </h4>

            </div>


            <div class="col-sm-4 col-4 text-right">

                <a
                    href="portfolio.php"
                    class="btn btn-info btn-rounded"
                >

                    <i class="fa fa-arrow-left"></i>

                    Back to Portfolio

                </a>

            </div>

        </div>


        <!-- =================================================
             SUCCESS MESSAGE
        ================================================== -->

        <?php if (!empty($message)) { ?>

            <div class="alert alert-success alert-dismissible fade show">

                <strong>
                    Success!
                </strong>

                <?= htmlspecialchars($message) ?>


                <button
                    type="button"
                    class="close"
                    data-dismiss="alert"
                >

                    <span>
                        &times;
                    </span>

                </button>

            </div>

        <?php } ?>


        <!-- =================================================
             ERROR MESSAGE
        ================================================== -->

        <?php if (!empty($error)) { ?>

            <div class="alert alert-danger alert-dismissible fade show">

                <strong>
                    Error!
                </strong>

                <?= htmlspecialchars($error) ?>


                <button
                    type="button"
                    class="close"
                    data-dismiss="alert"
                >

                    <span>
                        &times;
                    </span>

                </button>

            </div>

        <?php } ?>


        <!-- =================================================
             PORTFOLIO FORM
        ================================================== -->

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">

                    <i class="bi bi-briefcase me-2"></i>

                    Project Information

                </h5>

            </div>


            <div class="card-body">

                <form
                    method="POST"
                    enctype="multipart/form-data"
                >

                    <div class="row">


                        <!-- =================================
                             PROJECT TITLE
                        ================================== -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>

                                    Project Title

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>


                                <input
                                    type="text"
                                    name="title"
                                    class="form-control"
                                    placeholder="Enter project title"
                                    value="<?= htmlspecialchars($_POST['title'] ?? '') ?>"
                                    required
                                >

                            </div>

                        </div>


                        <!-- =================================
                             CATEGORY
                        ================================== -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>

                                    Category

                                    <span class="text-danger">
                                        *
                                    </span>

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
                                        mysqli_num_rows(
                                            $category_result
                                        ) > 0
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
                                                isset($_POST['category']) &&
                                                $_POST['category'] == $category['id']
                                            )
                                                ? 'selected'
                                                : ''
                                            ?>
                                        >

                                            <?= htmlspecialchars(
                                                $category['name']
                                            ) ?>

                                        </option>

                                    <?php

                                        }

                                    }

                                    ?>

                                </select>


                                <small class="text-muted">

                                    Select the category that best describes
                                    this project.

                                </small>

                            </div>

                        </div>


                        <!-- =================================
                             TECHNOLOGY
                        ================================== -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>

                                    Technology

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>


                                <input
                                    type="text"
                                    name="technology"
                                    class="form-control"
                                    placeholder="e.g. PHP, MySQL, Bootstrap"
                                    value="<?= htmlspecialchars($_POST['technology'] ?? '') ?>"
                                    required
                                >


                                <small class="text-muted">

                                    Example:
                                    PHP, MySQL, JavaScript, Bootstrap

                                </small>

                            </div>

                        </div>


                        <!-- =================================
                             PROJECT URL
                        ================================== -->

                        <div class="col-md-6">

                            <div class="form-group">

                                <label>
                                    Project URL
                                </label>


                                <input
                                    type="url"
                                    name="url"
                                    class="form-control"
                                    placeholder="https://example.com"
                                    value="<?= htmlspecialchars($_POST['url'] ?? '') ?>"
                                >


                                <small class="text-muted">

                                    Leave blank if the project has no live URL.

                                </small>

                            </div>

                        </div>


                        <!-- =================================
                             DESCRIPTION
                        ================================== -->

                        <div class="col-md-12">

                            <div class="form-group">

                                <label>

                                    Project Description

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>


                                <textarea
                                    name="description"
                                    rows="5"
                                    class="form-control"
                                    placeholder="Describe the project..."
                                    required
                                ><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>

                            </div>

                        </div>


                        <!-- =================================
                             IMAGE
                        ================================== -->

                        <div class="col-md-12">

                            <div class="form-group">

                                <label>

                                    Portfolio Image

                                    <span class="text-danger">
                                        *
                                    </span>

                                </label>


                                <input
                                    type="file"
                                    name="img"
                                    class="form-control"
                                    accept="image/jpeg,image/png,image/gif,image/webp"
                                    required
                                >


                                <small class="text-muted">

                                    JPG, JPEG, PNG, GIF or WEBP.
                                    Maximum size: 5MB.

                                </small>

                            </div>

                        </div>


                    </div>


                    <!-- =====================================
                         BUTTONS
                    ====================================== -->

                    <div class="text-right mt-4">

                        <a
                            href="portfolio.php"
                            class="btn btn-secondary"
                        >

                            Cancel

                        </a>


                        <button
                            type="submit"
                            name="add_portfolio"
                            class="btn btn-primary"
                        >

                            <i class="bi bi-plus-lg me-1"></i>

                            Add Portfolio

                        </button>

                    </div>


                </form>

            </div>

        </div>

    </div>

</div>


<?php include "footer.php"; ?>
