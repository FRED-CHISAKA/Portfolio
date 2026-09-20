<?php

    include "../include/config.php";

    if(!isset($_GET['id'])){
        header("Location: media.php");
        exit();
    }

    $id = intval($_GET['id']);

    /* Retrieve media */
    $query = "SELECT * FROM media WHERE id = '$id' ";
    
    $result = mysqli_query($conn, $query);
    $media = mysqli_fetch_assoc($result);

    if($media){

        /* Delete physical file */
        $file_path =
            "../"
            . $media['file_path'];

        if(file_exists($file_path)){
            unlink($file_path);
        }

        /* Delete database record */
        $delete = "DELETE FROM media WHERE id = '$id'";
        mysqli_query($conn, $delete);
    }

    header(
        "Location: media.php?deleted=1"
    );

    exit();

?>