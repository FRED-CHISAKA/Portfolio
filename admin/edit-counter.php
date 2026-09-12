<?php

include "../include/config.php";

/*
|--------------------------------------------------------------------------
| Validate ID BEFORE including header.php
|--------------------------------------------------------------------------
*/

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: about.php");
    exit;
}

$id = (int) $_GET["id"];

/*
|--------------------------------------------------------------------------
| Fetch Statistic
|--------------------------------------------------------------------------
*/

$sql = "SELECT * FROM counter WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    header("Location: about.php?error=database");
    exit;
}

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (!$result || mysqli_num_rows($result) === 0) {
    mysqli_stmt_close($stmt);

    header("Location: about.php?error=statistic_not_found");
    exit;
}

$counter = mysqli_fetch_assoc($result);

mysqli_stmt_close($stmt);

/*
|--------------------------------------------------------------------------
| Include layout AFTER all redirects
|--------------------------------------------------------------------------
*/

include "header.php";
include "sidebar.php";
?>

<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">

                <div class="col">
                    <h3 class="page-title">Edit Statistic</h3>

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="about.php">About</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Edit Statistic
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

        <!-- Edit Statistic Form -->
        <div class="row">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">
                            Edit Statistic Information
                        </h4>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="counter-update.php">

                            <!-- Hidden ID -->
                            <input
                                type="hidden"
                                name="id"
                                value="<?php echo $counter["id"]; ?>"
                            >

                            <!-- Icon -->
                            <div class="form-group">
                                <label>
                                    Icon <span class="text-danger">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="icon"
                                    class="form-control"
                                    value="<?php echo htmlspecialchars($counter["icon"]); ?>"
                                    placeholder="e.g. fa fa-code"
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
                                    value="<?php echo htmlspecialchars($counter["title"]); ?>"
                                    placeholder="e.g. Projects Completed"
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
                                    value="<?php echo htmlspecialchars($counter["pre"]); ?>"
                                    placeholder="e.g. +"
                                >
                            </div>

                            <!-- Suffix -->
                            <div class="form-group">
                                <label>Suffix</label>

                                <input
                                    type="text"
                                    name="post"
                                    class="form-control"
                                    value="<?php echo htmlspecialchars($counter["post"]); ?>"
                                    placeholder="e.g. +"
                                >
                            </div>

                            <!-- Buttons -->
                            <div class="text-right">

                                <a href="about.php" class="btn btn-secondary">
                                    Cancel
                                </a>

                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    <i class="fa fa-save"></i>
                                    Update Statistic
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