<?php
    include 'header.php';
    include 'sidebar.php';
?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="page-title">Add Testimonial</h4>
                </div>

                <div class="col-auto">
                    <a href="about.php" class="btn btn-secondary">
                        <i class="fa fa-arrow-left"></i> Back to Testimonials
                    </a>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <h5 class="mb-0">
                    <i class="fa fa-quote-left me-2"></i>
                    Add Client Testimonial
                </h5>
            </div>

            <div class="card-body">
                <form action="quote-store.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <!-- Client Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Client Name <span class="text-danger">*</span>
                            </label>

                            <input type="text" name="name" class="form-control" placeholder="Enter client name" required>
                        </div>

                        <!-- Position -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Position
                            </label>

                            <input type="text" name="title" class="form-control" placeholder="e.g. CEO, Manager, Director">
                        </div>

                        <!-- Company -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Company
                            </label>

                            <input type="text" name="company" class="form-control" placeholder="Enter company name">
                        </div>

                        <!-- Image -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">
                                Client Photo
                            </label>

                            <input type="file" name="img" class="form-control" accept="image/jpeg,image/png,image/gif,image/webp">

                            <small class="text-muted">
                                JPG, PNG, GIF or WEBP. Maximum 2MB.
                            </small>
                        </div>

                        <!-- Testimonial -->
                        <div class="col-md-12 mb-3">
                            <label class="form-label">
                                Testimonial <span class="text-danger">*</span>
                            </label>

                            <textarea name="quote" class="form-control" rows="6" placeholder="Enter the client's testimonial..." required ></textarea>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save"></i>
                            Save Testimonial
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