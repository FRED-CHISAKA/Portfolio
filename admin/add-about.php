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
                <h4 class="page-title">Add About</h4>
            </div>

            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="about.php" class="btn btn-secondary btn-rounded float-right">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
        </div>
    </div>

    <!-- About Form -->
    <div class="card shadow-sm border-0">

        <!-- Card Header -->
        <div class="card-header bg-white py-3">
            <h3 class="h5 mb-1">
                Personal Information
            </h3>

            <p class="text-muted small mb-0">
                Add the information displayed on your website's About page.
            </p>
        </div>

        <!-- Card Body -->
        <div class="card-body p-4">

            <form action="about-store.php" method="POST">

                <!-- Basic Information -->
                <div class="border-bottom pb-2 mb-4">
                    <h5 class="mb-0">
                        <i class="bi bi-person me-2"></i>
                        Basic Information
                    </h5>
                </div>

                <div class="row g-3 mb-4">

                    <!-- Full Name -->
                    <div class="col-md-6">
                        <label for="name" class="form-label">
                            Full Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            placeholder="e.g. Fred Chisaka"
                            required
                        >
                    </div>

                    <!-- Professional Title -->
                    <div class="col-md-6">
                        <label for="title" class="form-label">
                            Professional Title
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control"
                            placeholder="e.g. Software Engineer"
                            required
                        >
                    </div>

                    <!-- Slogan -->
                    <div class="col-12">
                        <label for="slogan" class="form-label">
                            Professional Slogan
                        </label>

                        <textarea
                            id="slogan"
                            name="slogan"
                            class="form-control"
                            rows="4"
                            placeholder="Write your professional introduction..."
                        ></textarea>

                        <div class="form-text">
                            This will appear as your introductory statement
                            on the About page.
                        </div>
                    </div>

                </div>

                <!-- Contact Information -->
                <div class="border-bottom pb-2 mb-4">
                    <h5 class="mb-0">
                        <i class="bi bi-telephone me-2"></i>
                        Contact Information
                    </h5>
                </div>

                <div class="row g-3 mb-4">

                    <!-- Email -->
                    <div class="col-md-6">
                        <label for="email" class="form-label">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            placeholder="example@email.com"
                        >
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">
                        <label for="phone" class="form-label">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            class="form-control"
                            placeholder="+254..."
                        >
                    </div>

                    <!-- Website -->
                    <div class="col-md-6">
                        <label for="website" class="form-label">
                            Website
                        </label>

                        <input
                            type="url"
                            id="website"
                            name="website"
                            class="form-control"
                            placeholder="https://example.com"
                        >
                    </div>

                    <!-- City -->
                    <div class="col-md-6">
                        <label for="city" class="form-label">
                            City
                        </label>

                        <input
                            type="text"
                            id="city"
                            name="city"
                            class="form-control"
                            placeholder="e.g. Kakamega"
                        >
                    </div>

                </div>

                <!-- Personal Details -->
                <div class="border-bottom pb-2 mb-4">
                    <h5 class="mb-0">
                        <i class="bi bi-person-vcard me-2"></i>
                        Personal Details
                    </h5>
                </div>

                <div class="row g-3 mb-4">

                    <!-- Birthday -->
                    <div class="col-md-6">
                        <label for="birthday" class="form-label">
                            Birthday
                        </label>

                        <input
                            type="date"
                            id="birthday"
                            name="birthday"
                            class="form-control"
                        >
                    </div>

                    <!-- Age -->
                    <div class="col-md-6">
                        <label for="age" class="form-label">
                            Age
                        </label>

                        <input
                            type="number"
                            id="age"
                            name="age"
                            class="form-control"
                            min="1"
                            max="120"
                        >
                    </div>

                    <!-- Degree -->
                    <div class="col-md-6">
                        <label for="degree" class="form-label">
                            Degree
                        </label>

                        <input
                            type="text"
                            id="degree"
                            name="degree"
                            class="form-control"
                            placeholder="e.g. BSc Software Engineering"
                        >
                    </div>

                    <!-- Certifications -->
                    <div class="col-md-6">
                        <label for="certification" class="form-label">
                            Certifications
                        </label>

                        <input
                            type="text"
                            id="certification"
                            name="certification"
                            class="form-control"
                            placeholder="e.g. Huawei, PowerDMARC..."
                        >
                    </div>

                </div>

                <!-- Availability -->
                <div class="border-bottom pb-2 mb-4">
                    <h5 class="mb-0">
                        <i class="bi bi-briefcase me-2"></i>
                        Availability
                    </h5>
                </div>

                <div class="row mb-4">

                    <div class="col-md-6">

                        <label for="freelance" class="form-label">
                            Freelance Availability
                        </label>

                        <select
                            name="freelance"
                            id="freelance"
                            class="form-control"
                        >

                            <option value="1">
                                Available
                            </option>

                            <option value="0">
                                Not Available
                            </option>

                        </select>

                    </div>

                </div>

                <!-- Submit Buttons -->
                <div class="d-flex gap-2 pt-3 border-top">

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i>
                        Save About
                    </button>

                    <button type="reset" class="btn btn-secondary">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                        Reset
                    </button>

                    <a href="about.php" class="btn btn-light">
                        Cancel
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

<?php
include "footer.php";
?>