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
                    <h3 class="page-title">Add Skill</h3>

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="about.php">About</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Add Skill
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
                    Skill icon and title are required.
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>

            <?php } elseif ($_GET["error"] === "failed") { ?>

                <div class="alert alert-danger alert-dismissible fade show">
                    Failed to add skill.
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>

            <?php } ?>
        <?php } ?>

        <!-- Add Skill -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Skill Information
                        </h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="skill-store.php">
                            <!-- Icon -->
                            <div class="form-group">
                                <label>
                                    Icon <span class="text-danger">*</span>
                                </label>

                                <input type="text" name="icon" class="form-control" placeholder="e.g. fa fa-code" required>
                                <small class="form-text text-muted">
                                    Enter the Font Awesome icon class.
                                </small>
                            </div>

                            <!-- Title -->
                            <div class="form-group">
                                <label>
                                    Skill Title <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="title" class="form-control" placeholder="e.g. PHP" required>
                            </div>

                            <!-- Color -->
                            <div class="form-group">
                                <label>Color</label>
                                <input type="text" name="color" class="form-control" placeholder="e.g. #777777 or primary">
                                <small class="form-text text-muted">
                                    Enter the color value used by your public skills section.
                                </small>
                            </div>

                            <!-- Buttons -->
                            <div class="text-right">

                                <a href="about.php" class="btn btn-secondary">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    Add Skill
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