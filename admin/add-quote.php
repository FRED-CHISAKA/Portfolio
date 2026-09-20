```php
<?php

    include "../include/config.php";
    include "header.php";
    include "sidebar.php";

?>

<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Testimonial</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="about.php">About</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Add Testimonial
                        </li>
                    </ul>
                </div>

                <div class="col-auto">
                    <a href="about.php" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>

        <!-- Error Messages -->
        <?php if (isset($_GET["error"])) { ?>
            <?php if ($_GET["error"] === "required") { ?>

                <div class="alert alert-danger alert-dismissible fade show">
                    Name and testimonial are required.
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>

            <?php } elseif ($_GET["error"] === "failed") { ?>

                <div class="alert alert-danger alert-dismissible fade show">
                    Failed to add testimonial.
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            <?php } ?>
        <?php } ?>

        <!-- Add Testimonial -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Testimonial Information
                        </h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="quote-store.php">
                            <!-- Image -->
                            <div class="form-group">
                                <label>Image</label>

                                <input type="text" name="img" class="form-control" placeholder="e.g. assets/img/testimonials/client.jpg">
                                <small class="form-text text-muted">
                                    Enter the path or filename of the client's testimonial image.
                                </small>
                            </div>

                            <!-- Name -->
                            <div class="form-group">
                                <label>
                                    Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" ame="name" class="form-control" placeholder="e.g. John Doe" required>
                            </div>

                            <!-- Title -->
                            <div class="form-group">
                                <label>Title / Position</label>
                                <input type="text" name="title" class="form-control" placeholder="e.g. Project Manager">
                            </div>

                            <!-- Company -->
                            <div class="form-group">
                                <label>Company</label>
                                <input type="text" name="company" class="form-control" placeholder="e.g. ABC Technologies">
                            </div>

                            <!-- Testimonial -->
                            <div class="form-group">
                                <label>
                                    Testimonial <span class="text-danger">*</span>
                                </label>
                                <textarea name="quote" rows="5" class="form-control" placeholder="Enter the client's testimonial..." required></textarea>
                            </div>

                            <!-- Buttons -->
                            <div class="text-right">
                                <a href="about.php" class="btn btn-secondary">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    Add Testimonial
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

