<?php

    include "../include/config.php";

    /* Validate ID */
    if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
        header("Location: about.php");
        exit;
    }

    $id = (int) $_GET["id"];

    /* Fetch Testimonial */
    $sql = "SELECT * FROM quotes WHERE id = ?";
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
        header("Location: about.php?error=testimonial_not_found");
        exit;
    }

    $quote = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    /* Include Layout */
    include "header.php";
    include "sidebar.php";

?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">

                <div class="col">
                    <h3 class="page-title">Edit Testimonial</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="about.php">About</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Edit Testimonial
                        </li>
                    </ul>
                </div>

                <div class="col-auto">
                    <a href="about.php" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i>
                        Back
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
                    Failed to update testimonial.

                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>

            <?php } ?>
        <?php } ?>

        <!-- Edit Testimonial -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            Edit Testimonial Information
                        </h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="quote-update.php">

                            <!-- Hidden ID -->
                            <input type="hidden" name="id" value="<?php echo $quote["id"]; ?>">

                            <!-- Image -->
                            <div class="form-group">
                                <label>Image</label>

                                <input type="text" name="img" class="form-control"
                                    value="<?php echo htmlspecialchars($quote["img"]); ?>"
                                    placeholder="e.g. assets/img/testimonials/client.jpg"
                                >

                                <small class="form-text text-muted">
                                    Enter the path or filename of the testimonial image.
                                </small>
                            </div>

                            <!-- Name -->
                            <div class="form-group">
                                <label>
                                    Name
                                    <span class="text-danger">*</span>
                                </label>

                                <input type="text" name="name" class="form-control"
                                    value="<?php echo htmlspecialchars($quote["name"]); ?>"
                                    required
                                >
                            </div>

                            <!-- Title -->
                            <div class="form-group">
                                <label>Title / Position</label>

                                <input type="text" name="title" class="form-control"
                                    value="<?php echo htmlspecialchars($quote["title"]); ?>"
                                    placeholder="e.g. Project Manager"
                                >
                            </div>

                            <!-- Company -->
                            <div class="form-group">
                                <label>Company</label>

                                <input type="text" name="company" class="form-control"
                                    value="<?php echo htmlspecialchars($quote["company"]); ?>"
                                    placeholder="e.g. ABC Technologies"
                                >
                            </div>

                            <!-- Testimonial -->
                            <div class="form-group">
                                <label>
                                    Testimonial
                                    <span class="text-danger">*</span>
                                </label>

                                <textarea name="quote" rows="5" class="form-control" required>
                                    <?php echo htmlspecialchars($quote["quote"]); ?>
                                </textarea>

                            </div>

                            <!-- Buttons -->
                            <div class="text-right">
                                <a href="about.php" class="btn btn-secondary">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    Update Testimonial
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