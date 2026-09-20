<?php

    include "../include/config.php";

    /* Validate ID */
    if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
        header("Location: about.php");
        exit;
    }

    $id = (int) $_GET["id"];

    /* Fetch Skill */

    $sql = "SELECT * FROM skills WHERE id = ?";
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
        header("Location: about.php?error=skill_not_found");
        exit;
    }

    $skill = mysqli_fetch_assoc($result);
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
                    <h3 class="page-title">Edit Skill</h3>

                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Dashboard</a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="about.php">About</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Edit Skill
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
                    Failed to update skill.
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>

            <?php } ?>

        <?php } ?>

        <!-- Edit Skill -->
        <div class="row">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <h4 class="card-title">
                            Edit Skill Information
                        </h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="skill-update.php">

                            <!-- Hidden ID -->
                            <input type="hidden" name="id" value="<?php echo $skill["id"]; ?>">

                            <!-- Icon -->
                            <div class="form-group">
                                <label>
                                    Icon <span class="text-danger">*</span>
                                </label>

                                <input type="text" name="icon" class="form-control"
                                    value="<?php echo htmlspecialchars($skill["icon"]); ?>"
                                    placeholder="e.g. fa fa-code" required
                                >

                                <small class="form-text text-muted">
                                    Enter the Font Awesome icon class.
                                </small>
                            </div>

                            <!-- Title -->
                            <div class="form-group">
                                <label>
                                    Skill Title <span class="text-danger">*</span>
                                </label>

                                <input type="text" name="title" class="form-control"
                                    value="<?php echo htmlspecialchars($skill["title"]); ?>"
                                    placeholder="e.g. PHP"
                                    required
                                >
                            </div>

                            <!-- Color -->
                            <div class="form-group">
                                <label>Color</label>

                                <input type="text" name="color" class="form-control"
                                    value="<?php echo htmlspecialchars($skill["color"]); ?>"
                                    placeholder="e.g. #777777"
                                >

                                <small class="form-text text-muted">
                                    Enter the color used by your public skills section.
                                </small>
                            </div>

                            <!-- Buttons -->
                            <div class="text-right">
                                <a href="about.php" class="btn btn-secondary">
                                    Cancel
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i>
                                    Update Skill
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