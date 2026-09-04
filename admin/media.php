<?php

include "../include/config.php";

$media_query = "
    SELECT *
    FROM media
    ORDER BY uploaded_at DESC
";

$media_result = mysqli_query(
    $conn,
    $media_query
);

?>



<?php

include "header.php";
include "sidebar.php";

?>
        
        
        <div class="page-wrapper">
            <div class="content">

                <!-- Page Header -->
                <div class="row">
                    <div class="col-sm-6 col-6">
                        <h4 class="page-title">Media Library</h4>
                        <p class="text-muted">Manage images, videos, documents and downloadable assets.</p>
                    </div>

                    <div class="col-sm-6 col-6 text-right">
                        <a href="add-media.php" class="btn btn-primary btn-rounded">
                            <i class="fa fa-upload"></i> Upload Media
                        </a>
                    </div>
                </div>

                <?php

                    $total_images_query = "
                        SELECT COUNT(*) AS total
                        FROM media
                        WHERE media_type = 'image'
                    ";

                    $total_images_result = mysqli_query(
                        $conn,
                        $total_images_query
                    );

                    $total_images = mysqli_fetch_assoc(
                        $total_images_result
                    )['total'];



                    $total_videos_query = "
                        SELECT COUNT(*) AS total
                        FROM media
                        WHERE media_type = 'video'
                    ";

                    $total_videos_result = mysqli_query(
                        $conn,
                        $total_videos_query
                    );

                    $total_videos = mysqli_fetch_assoc(
                        $total_videos_result
                    )['total'];



                    $total_documents_query = "
                        SELECT COUNT(*) AS total
                        FROM media
                        WHERE media_type = 'document'
                    ";

                    $total_documents_result = mysqli_query(
                        $conn,
                        $total_documents_query
                    );

                    $total_documents = mysqli_fetch_assoc(
                        $total_documents_result
                    )['total'];



                    $storage_query = "
                        SELECT SUM(file_size) AS total_size
                        FROM media
                    ";

                    $storage_result = mysqli_query(
                        $conn,
                        $storage_query
                    );

                    $storage_data = mysqli_fetch_assoc(
                        $storage_result
                    );

                    $total_storage = $storage_data['total_size'] ?? 0;

                    $storage_mb = round(
                        $total_storage / 1024 / 1024,
                        2
                    );

                ?>

                <!-- Statistics -->
                <div class="row mt-4">

                    <div class="col-md-3">
                        <div class="card dash-widget">
                            <div class="card-body text-center">
                                <i class="fa fa-picture-o fa-3x text-primary mb-2"></i>
                                <h3><?=$total_images?></h3>
                                <p>Total Images</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card dash-widget">
                            <div class="card-body text-center">
                                <i class="fa fa-video-camera fa-3x text-success mb-2"></i>
                                <h3><?=$total_images?></h3>
                                <p>Videos</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card dash-widget">
                            <div class="card-body text-center">
                                <i class="fa fa-file-pdf-o fa-3x text-danger mb-2"></i>
                                <h3><?=$total_documents?></h3>
                                <p>Documents</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card dash-widget">
                            <div class="card-body text-center">
                                <i class="fa fa-database fa-3x text-warning mb-2"></i>
                                <h3><?=$storage_mb?> MB</h3>
                                <p>Storage Used</p>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Filters -->
                <div class="card mt-4">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" class="form-control"
                                    placeholder="Search media files...">
                            </div>

                            <div class="col-md-3">
                                <select class="form-control">
                                    <option>All Types</option>
                                    <option>Images</option>
                                    <option>Videos</option>
                                    <option>Documents</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <select class="form-control">
                                    <option>Newest First</option>
                                    <option>Oldest First</option>
                                    <option>Name A-Z</option>
                                    <option>Name Z-A</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <button class="btn btn-primary btn-block">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Media Grid -->
                <div class="row mt-4">

                    <?php
                    if(mysqli_num_rows($media_result) > 0){
                        while($media = mysqli_fetch_assoc($media_result)){

                    ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card media-card">

                                    <!-- IMAGE -->
                                    <?php if($media['media_type'] == 'image'){ ?>
                                        <img
                                            src="../<?=$media['file_path']?>"
                                            class="card-img-top"
                                            alt="<?=$media['title']?>"
                                            style="
                                                height: 200px;
                                                object-fit: cover;
                                            "
                                        >
                                    <?php } ?>

                                    <!-- VIDEO -->
                                    <?php if($media['media_type'] == 'video'){ ?>
                                        <video
                                            class="card-img-top"
                                            style="
                                                height: 200px;
                                                object-fit: cover;
                                            "
                                            controls
                                        >
                                            <source
                                                src="../<?=$media['file_path']?>"
                                                type="<?=$media['file_type']?>"
                                            >
                                        </video>
                                    <?php } ?>

                                    <!-- DOCUMENT -->
                                    <?php if($media['media_type'] == 'document'){ ?>
                                        <div
                                            class="text-center p-5"
                                        >
                                            <i class="
                                                fa fa-file-pdf-o
                                                fa-5x
                                                text-danger
                                            "></i>
                                        </div>
                                    <?php } ?>

                                    <div class="card-body">

                                        <!-- Title -->
                                        <h6 class="mb-1">
                                            <?=$media['title']?>
                                        </h6>

                                        <!-- File Information -->
                                        <small class="text-muted">
                                            <?=strtoupper($media['media_type'])?>
                                            •
                                            <?=round(
                                                $media['file_size']
                                                / 1024 / 1024,
                                                2
                                            )?>
                                            MB
                                        </small>

                                        <!-- Actions -->
                                        <div class="mt-3 text-center">

                                            <!-- VIEW -->
                                            <a
                                                href="../<?=$media['file_path']?>"
                                                target="_blank"
                                                class="btn btn-sm btn-info"
                                            >
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <!-- DOWNLOAD -->
                                            <a
                                                href="../<?=$media['file_path']?>"
                                                download
                                                class="btn btn-sm btn-success"
                                            >
                                                <i class="fa fa-download"></i>
                                            </a>

                                            <!-- EDIT -->
                                            <a
                                                href="edit-media.php?id=<?=$media['id']?>"
                                                class="btn btn-sm btn-warning"
                                            >
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <!-- DELETE -->
                                            <a
                                                href="delete-media.php?id=<?=$media['id']?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="
                                                    return confirm(
                                                        'Are you sure you want to delete this media?'
                                                    )
                                                "
                                            >
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }

                    else{
                    ?>
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                No media files found.
                            </div>
                        </div>
                    <?php

                    }

                    ?>

                </div>

                <!-- Media Table -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="card-title mb-0">All Media Files</h4>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <table class="table table-striped table-hover">

                                <thead>
                                    <tr>
                                        <th>Preview</th>
                                        <th>File Name</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                        <th>Date Uploaded</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    $table_query = "
                                        SELECT *
                                        FROM media
                                        ORDER BY uploaded_at DESC
                                    ";

                                    $table_result = mysqli_query(
                                        $conn,
                                        $table_query
                                    );


                                    if(
                                        mysqli_num_rows(
                                            $table_result
                                        ) > 0
                                    ){

                                        while(
                                            $media =
                                            mysqli_fetch_assoc(
                                                $table_result
                                            )
                                        ){

                                    ?>

                                    <tr>

                                        <!-- Preview -->
                                        <td>

                                            <?php
                                            if(
                                                $media['media_type']
                                                == 'image'
                                            ){
                                            ?>
                                                <img
                                                    src="../<?=$media['file_path']?>"
                                                    width="60"
                                                    height="50"
                                                    style="object-fit:cover;"
                                                >

                                            <?php
                                            }
                                            elseif(
                                                $media['media_type']
                                                == 'video'
                                            ){
                                            ?>
                                                <i
                                                    class="
                                                        fa fa-video-camera
                                                        fa-2x
                                                    "
                                                ></i>
                                            <?php
                                            }
                                            else{
                                            ?>
                                                <i
                                                    class="
                                                        fa fa-file
                                                        fa-2x
                                                        text-danger
                                                    "
                                                ></i>

                                            <?php
                                            }
                                            ?>

                                        </td>

                                        <!-- File Name -->
                                        <td>
                                            <?=$media['file_name']?>
                                        </td>

                                        <!-- Type -->

                                        <td>
                                            <?=ucfirst(
                                                $media['media_type']
                                            )?>
                                        </td>

                                        <!-- Size -->

                                        <td>
                                            <?=round(
                                                $media['file_size']
                                                / 1024 / 1024,
                                                2
                                            )?>
                                            MB
                                        </td>

                                        <!-- Upload Date -->
                                        <td>
                                            <?=date(
                                                "d M Y",
                                                strtotime(
                                                    $media['uploaded_at']
                                                )
                                            )?>
                                        </td>

                                        <!-- Actions -->
                                        <td>
                                            <a
                                                href="../<?=$media['file_path']?>"
                                                target="_blank"
                                                class="
                                                    btn
                                                    btn-sm
                                                    btn-info
                                                "
                                            >
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a
                                                href="edit-media.php?id=<?=$media['id']?>"
                                                class="
                                                    btn
                                                    btn-sm
                                                    btn-warning
                                                "
                                            >
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <a
                                                href="delete-media.php?id=<?=$media['id']?>"
                                                class="
                                                    btn
                                                    btn-sm
                                                    btn-danger
                                                "
                                                onclick="
                                                    return confirm(
                                                        'Delete this file?'
                                                    )
                                                "
                                            >
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <?php

                                        }
                                    }
                                    else{

                                    ?>

                                    <tr>
                                        <td
                                            colspan="6"
                                            class="text-center"
                                        >
                                            No media files found.
                                        </td>
                                    </tr>

                                    <?php

                                    }

                                    ?>

                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="notification-box">
            <div class="msg-sidebar notifications msg-noti">
                <div class="topnav-dropdown-header">
                    <span>Messages</span>
                </div>
                <div class="drop-scroll msg-list-scroll" id="msg_list">
                    <ul class="list-box">
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Richard Miles </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item new-message">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Chisaka Fred</span>
                                        <span class="message-time">1 Aug</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Tarah Shropshire </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Mike Litorus</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Catherine Manseau </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">D</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Domenic Houston </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">B</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Buster Wigton </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">R</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Rolland Webber </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">C</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author"> Claire Mapes </span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">M</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Melita Faucher</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">J</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Jeffery Lalor</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">L</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Loren Gatlin</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="messages.php">
                                <div class="list-item">
                                    <div class="list-left">
                                        <span class="avatar">T</span>
                                    </div>
                                    <div class="list-body">
                                        <span class="message-author">Tarah Shropshire</span>
                                        <span class="message-time">12:28 AM</span>
                                        <div class="clearfix"></div>
                                        <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="messages.php">See all messages</a>
                </div>
            </div>
        </div>

            <?php

            include "footer.php";

            ?>




    <script>
        
        document.addEventListener("DOMContentLoaded", function () {

            const activeItem = document.querySelector('#sidebar-menu li.active');

            if (activeItem) {
                activeItem.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }

        });

    </script>

</body>

</html>