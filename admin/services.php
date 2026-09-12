<?php

include "../include/config.php";
include "header.php";
include "sidebar.php";

?>

<!-- Main Content -->
<div class="page-wrapper">
    <!-- Page Header -->
     <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Services</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="services-add.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Service</a>
            </div>
        </div>
     </div>


    <!-- Service Form -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h3 class="h5 mb-1">
                <i class="bi bi-plus-circle me-2"></i>
                Service Information
            </h3>

            <p class="text-muted small mb-0">
                Enter the details for the new service.
            </p>
        </div>

        <div class="card-body p-4">
            <form action="service-store.php" method="POST">

                <!-- Service Information -->
                <div class="border-bottom pb-2 mb-4">
                    <h5 class="mb-0">
                        <i class="bi bi-grid me-2"></i>
                        Service Details
                    </h5>
                </div>

                <div class="row g-3 mb-4">

                    <!-- Title -->
                    <div class="col-md-6">
                        <label for="title" class="form-label">
                            Service Title
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            class="form-control"
                            placeholder="e.g. Web Development"
                            required
                        >
                    </div>

                    <!-- Icon -->
                    <div class="col-md-6">
                        <label for="icon" class="form-label">
                            Bootstrap Icon Class
                        </label>

                        <input
                            type="text"
                            name="icon"
                            id="icon"
                            class="form-control"
                            placeholder="e.g. bi bi-code-slash"
                            required
                        >

                        <div class="form-text">
                            Example: <code>bi bi-code-slash</code>
                        </div>
                    </div>

                    <!-- URL -->
                    <div class="col-md-6">
                        <label for="url" class="form-label">
                            Service URL
                        </label>

                        <input
                            type="text"
                            name="url"
                            id="url"
                            class="form-control"
                            placeholder="e.g. web-development.php"
                            required
                        >
                    </div>

                    <!-- Description -->
                    <div class="col-12">
                        <label for="description" class="form-label">
                            Description
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            class="form-control"
                            rows="5"
                            placeholder="Describe the service..."
                            required
                        ></textarea>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="d-flex gap-2 pt-3 border-top">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i>
                        Save Service
                    </button>

                    <a href="services.php" class="btn btn-secondary">
                        <i class="bi bi-x-lg me-1"></i>
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
include "footer.php";
?>