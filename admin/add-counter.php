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
                    <h3 class="page-title">Add Statistic</h3>

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="about.php">About</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Add Statistic
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

        <!-- Error Message -->
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <?php echo htmlspecialchars($error); ?>
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        <?php } ?>

        <!-- Add Statistic Form -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Statistic Information</h4>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="counter-store.php">

                            <!-- Icon -->
                            <div class="form-group">
                                <label>
                                    Icon <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="icon"
                                    class="form-control"
                                    placeholder="e.g. fa fa-code"
                                    value="<?php echo htmlspecialchars($_POST["icon"] ?? ""); ?>"
                                    required
                                >

                                <small class="form-text text-muted">
                                    Enter the Font Awesome icon class.
                                </small>
                            </div>

                            <!-- Title -->
                            <div class="form-group">
                                <label>
                                    Title <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    class="form-control"
                                    placeholder="e.g. Projects Completed"
                                    value="<?php echo htmlspecialchars($_POST["title"] ?? ""); ?>"
                                    required
                                >
                            </div>

                            <!-- Prefix -->
                            <div class="form-group">
                                <label>Prefix</label>

                                <input
                                    type="text"
                                    name="pre"
                                    class="form-control"
                                    placeholder="e.g. +"
                                    value="<?php echo htmlspecialchars($_POST["pre"] ?? ""); ?>"
                                >

                                <small class="form-text text-muted">
                                    Optional text displayed before the number.
                                </small>
                            </div>

                            <!-- Suffix -->
                            <div class="form-group">
                                <label>Suffix</label>

                                <input
                                    type="text"
                                    name="post"
                                    class="form-control"
                                    placeholder="e.g. +"
                                    value="<?php echo htmlspecialchars($_POST["post"] ?? ""); ?>"
                                >

                                <small class="form-text text-muted">
                                    Optional text displayed after the number.
                                </small>
                            </div>

                            <!-- Buttons -->
                            <div class="text-right">

                                <a href="about.php" class="btn btn-secondary">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    Add Statistic
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