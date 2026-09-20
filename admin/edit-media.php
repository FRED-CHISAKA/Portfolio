<?php

    include "../include/config.php";
    include "header.php";
    include "sidebar.php";

    if(!isset($_GET['id'])){
        header("Location: media.php");
        exit();
    }

    $id = intval($_GET['id']);

    /* Retrieve media */
    $query = "SELECT * FROM media WHERE id = '$id'";

    $result = mysqli_query($conn,$query);
    $media = mysqli_fetch_assoc($result);

    if(!$media){
        header("Location: media.php");
        exit();
    }

    /* UPDATE */
    if(isset($_POST['update_media'])){

        $title = mysqli_real_escape_string($conn, $_POST['title']);

        /* If new file is uploaded */
        if(
            isset($_FILES['media_file'])
            &&
            $_FILES['media_file']['name'] != ""
        ){
            $file_name =
                $_FILES['media_file']['name'];

            $file_tmp =
                $_FILES['media_file']['tmp_name'];

            $file_size =
                $_FILES['media_file']['size'];

            $file_type =
                $_FILES['media_file']['type'];

            $extension = strtolower(
                pathinfo(
                    $file_name,
                    PATHINFO_EXTENSION
                )
            );

            $allowed = ["jpg", "jpeg", "png", "gif", "webp", "pdf", "mp4" ];

            if(in_array($extension, $allowed)){

                $new_file_name =
                    time()
                    . "_"
                    . uniqid()
                    . "."
                    . $extension;

                $upload_folder =
                    "../assets/uploads/media/";

                $database_path =
                    "assets/uploads/media/"
                    . $new_file_name;

                $upload_path =
                    $upload_folder
                    . $new_file_name;

                /* Determine type */

                if(
                    in_array($extension,
                        [
                            "jpg", "jpeg", "png", "gif", "webp"
                        ]
                    )
                ){
                    $media_type = "image";
                }
                elseif($extension == "mp4"){
                    $media_type = "video";
                }
                else{
                    $media_type = "document";
                }

                if(
                    move_uploaded_file($file_tmp, $upload_path)
                ){

                    /* Delete old physical file */
                    $old_file =
                        "../"
                        . $media['file_path'];

                    if(file_exists($old_file)){
                        unlink($old_file);
                    }

                    /* Update database */
                    $update = " UPDATE media SET
                            title = '$title',
                            file_name = '$new_file_name',
                            file_path = '$database_path',
                            file_type = '$file_type',
                            file_size = '$file_size',
                            media_type = '$media_type'
                        WHERE id = '$id'
                    ";

                    mysqli_query($conn, $update);
                }
            }
        }
        else{

            /* Update title only */
            $update = "UPDATE media SET title = '$title' WHERE id = '$id' ";
            mysqli_query($conn, $update);
        }

        header(
            "Location: media.php?updated=1"
        );

        exit();
    }

?>


<div class="page-wrapper">
    <div class="content">

        <!-- Page Header -->
        <div class="row">
            <div class="col-sm-6">
                <h4 class="page-title">
                    Edit Media
                </h4>
            </div>

            <div class="col-sm-6 text-right">
                <a href="media.php" class="btn btn-secondary">
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">

                    <!-- Preview -->
                    <?php
                        if(
                            $media['media_type']
                            == 'image'
                        ){
                    ?>

                        <div class="text-center mb-4">

                            <img src="../<?=$media['file_path']?>"
                                style="
                                    max-height:250px;
                                    max-width:100%;
                                "
                            >
                        </div>

                    <?php } ?>

                    <!-- Title -->
                    <div class="form-group">
                        <label>
                            Media Title
                        </label>

                        <input type="text" name="title" class="form-control"
                            value="<?=$media['title']?>" required
                        >

                    </div>

                    <!-- Replace File -->
                    <div class="form-group">
                        <label>
                            Replace File
                        </label>

                        <input type="file" name="media_file" class="form-control">

                        <small class="text-muted">
                            Leave empty if you only want to change the title.
                        </small>
                    </div>

                    <div class="text-right">
                        <button type="submit" name="update_media" class="btn btn-primary">
                            <i class="fa fa-save"></i>
                            Update Media
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>