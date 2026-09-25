<?php

    include '../include/config.php';
    include 'quote-functions.php';

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("Location: about.php?id=");
        exit;
    }

    $id = (int) $_GET['id'];
    $sql = "SELECT * FROM quotes WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $quoteData = mysqli_fetch_assoc($result);

    if (!$quoteData) {
        $_SESSION['error'] = "Testimonial not found.";
        header("Location: about.php?id=");
        exit;
    }
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="page-title">
                        Edit Testimonial
                    </h4>
                </div>

                <div class="col-auto">
                    <a href="about.php" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i>
                        Back to Testimonials
                    </a>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fa fa-pencil me-2"></i>
                    Edit Client Testimonial
                </h5>
            </div>

            <div class="card-body">
                <form action="quote-update.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= (int)$quoteData['id'] ?>">

                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Client Name <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" class="form-control"
                                value="<?= htmlspecialchars($quoteData['name']) ?>"
                                required
                            >
                        </div>

                        <!-- Position -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Position
                            </label>

                            <input type="text" name="title" class="form-control"
                                value="<?= htmlspecialchars($quoteData['title']) ?>"
                            >
                        </div>

                        <!-- Company -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Company
                            </label>

                            <input type="text" name="company" class="form-control"
                                value="<?= htmlspecialchars($quoteData['company']) ?>"
                            >
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Replace Client Photo
                            </label>

                            <input type="file" name="img" class="form-control"
                                accept="image/jpeg,image/png,image/gif,image/webp"
                            >

                            <small class="text-muted">
                                Leave empty to keep the current image.
                            </small>
                        </div>

                        <!-- Current Image -->
                        <?php if (!empty($quoteData['img'])): ?>
                            <div class="col-md-12 mb-4">

                                <label class="form-label">
                                    Current Photo
                                </label>

                                <div>
                                    <img src="<?= htmlspecialchars(quoteImagePath($quoteData['img'])) ?>"
                                        alt="<?= htmlspecialchars($quoteData['name']) ?>"
                                        style="
                                            width:100px;
                                            height:100px;
                                            object-fit:cover;
                                            border-radius:50%;
                                            border:1px solid #ddd;
                                        "
                                    >
                                </div>
                            </div>

                        <?php endif; ?>

                        <!-- Testimonial -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                Testimonial <span class="text-danger">*</span>
                            </label>

                            <textarea name="quote" class="form-control" rows="6"
                                required
                            ><?= htmlspecialchars($quoteData['quote']) ?></textarea>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i>
                            Update Testimonial
                        </button>

                        <a href="about.php" class="btn btn-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>