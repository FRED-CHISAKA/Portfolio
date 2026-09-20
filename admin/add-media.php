<?php

    include "../include/config.php";
    include "header.php";
    include "sidebar.php";

    $message = "";

    if(isset($_POST['upload_media'])){
        $title = mysqli_real_escape_string($conn, $_POST['title']);

        $file_name = $_FILES['media_file']['name'];
        $file_tmp = $_FILES['media_file']['tmp_name'];
        $file_size = $_FILES['media_file']['size'];
        $file_type = $_FILES['media_file']['type'];

        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed_extensions = array( "jpg", "jpeg", "png", "gif", "webp", "pdf", "mp4");

        if(in_array($file_extension, $allowed_extensions)){

            /* Generate a unique file name*/
            $new_file_name = time() . "_" . uniqid() . "." . $file_extension;

            /* Upload folder */
            $upload_folder = "../assets/uploads/media/";

            /* Path stored in database */
            $database_path = "assets/uploads/media/" . $new_file_name;

            /* Full server path */
            $upload_path = $upload_folder . $new_file_name;

            /* Determine media type */

            if(in_array($file_extension, ["jpg", "jpeg", "png", "gif", "webp"])){
                $media_type = "image";
            }
            elseif(in_array($file_extension, ["mp4"])){
                $media_type = "video";
            }
            else{
                $media_type = "document";
            }

            /* Upload file */
            if(move_uploaded_file($file_tmp, $upload_path)){

                $sql = "INSERT INTO media
                    (
                        title, file_name, file_path, file_type, file_size, media_type
                    )
                    VALUES
                    (
                        '$title', '$new_file_name', '$database_path', '$file_type', '$file_size', '$media_type'
                    )
                ";

                if(mysqli_query($conn, $sql)){
                    header("Location: media.php?success=1");
                    exit();
                }
                else{
                    $message = "Database Error: " . mysqli_error($conn);
                }
            }
            else{
                $message = "Failed to upload file.";
            }
        }
        else{
            $message = "File type not allowed.";
        }
    }

?>

<div class="page-wrapper">
    <div class="content">
        <!-- Page Header -->
        <div class="row">
            <div class="col-sm-6">
                <h4 class="page-title">
                    Upload Media
                </h4>

                <p class="text-muted">
                    Upload images, videos and documents.
                </p>
            </div>

            <div class="col-sm-6 text-right">
                <a href="media.php"
                   class="btn btn-secondary btn-rounded">
                    <i class="fa fa-arrow-left"></i>
                    Back to Media
                </a>
            </div>
        </div>

        <!-- Message -->
        <?php if($message != ""){ ?>
            <div class="alert alert-danger mt-3">
                <?=$message?>
            </div>
        <?php } ?>

        <!-- Upload Form -->
        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">

                    <!-- Title -->
                    <div class="form-group">
                        <label>
                            Media Title
                        </label>

                        <input type="text" name="title" class="form-control" placeholder="Enter media title" required>
                    </div>

                    <!-- File -->
                    <div class="form-group">
                        <label>
                            Select File
                        </label>

                        <input type="file" name="media_file" class="form-control" required>

                        <small class="text-muted">
                            Allowed: JPG, JPEG, PNG, GIF, WEBP, PDF and MP4
                        </small>
                    </div>

                    <!-- Submit -->
                    <div class="text-right">
                        <button type="submit" name="upload_media" class="btn btn-primary">
                            <i class="fa fa-upload"></i>
                            Upload Media
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>