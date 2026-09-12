<?php

    include "../include/config.php";

    /* Get ID */

    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header("Location: about.php");
        exit();
    }

    $id = (int) $_GET['id'];


    /* Get About information */

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 0) {
        header("Location: about.php?error=notfound");
        exit;
    }

    $data = mysqli_fetch_assoc($result);

    include "header.php";
    include "sidebar.php";
?>

<!-- Main Content -->
<div class="page-wrapper">

    <!-- Page Header -->
    <div class="content">

        <div class="row">

            <div class="col-sm-4 col-3">
                <h4 class="page-title">
                    Edit About
                </h4>
            </div>

            <div class="col-sm-8 col-9 text-right m-b-20">

                <a
                    href="about.php"
                    class="btn btn-secondary btn-rounded float-right"
                >
                    <i class="fa fa-arrow-left"></i>
                    Back
                </a>

            </div>

        </div>

    </div>


    <!-- About Form -->
    <div class="card shadow-sm border-0">

        <div class="card-header bg-white py-3">

            <h3 class="h5 mb-1">
                Personal Information
            </h3>

            <p class="text-muted small mb-0">
                Update the information displayed on your website.
            </p>

        </div>


        <div class="card-body p-4">

            <form action="about-update.php" method="POST">

                <input
                    type="hidden"
                    name="id"
                    value="<?= htmlspecialchars($data['id']) ?>"
                >


                <!-- Basic Information -->

                <div class="border-bottom pb-2 mb-4">

                    <h5 class="mb-0">
                        <i class="bi bi-person me-2"></i>
                        Basic Information
                    </h5>

                </div>


                <div class="row g-3 mb-4">

                    <div class="col-md-6">

                        <label for="name" class="form-label">
                            Full Name
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-control"
                            value="<?= htmlspecialchars($data['name']) ?>"
                            required
                        >

                    </div>


                    <div class="col-md-6">

                        <label for="title" class="form-label">
                            Professional Title
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            class="form-control"
                            value="<?= htmlspecialchars($data['title']) ?>"
                            required
                        >

                    </div>


                    <div class="col-12">

                        <label for="slogan" class="form-label">
                            Professional Slogan
                        </label>

                        <textarea
                            id="slogan"
                            name="slogan"
                            class="form-control"
                            rows="4"
                        ><?= htmlspecialchars($data['slogan']) ?></textarea>

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

                    <div class="col-md-6">

                        <label for="email" class="form-label">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-control"
                            value="<?= htmlspecialchars($data['email']) ?>"
                        >

                    </div>


                    <div class="col-md-6">

                        <label for="phone" class="form-label">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            class="form-control"
                            value="<?= htmlspecialchars($data['phone']) ?>"
                        >

                    </div>


                    <div class="col-md-6">

                        <label for="website" class="form-label">
                            Website
                        </label>

                        <input
                            type="url"
                            id="website"
                            name="website"
                            class="form-control"
                            value="<?= htmlspecialchars($data['website']) ?>"
                        >

                    </div>


                    <div class="col-md-6">

                        <label for="city" class="form-label">
                            City
                        </label>

                        <input
                            type="text"
                            id="city"
                            name="city"
                            class="form-control"
                            value="<?= htmlspecialchars($data['city']) ?>"
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

                    <div class="col-md-6">

                        <label for="birthday" class="form-label">
                            Birthday
                        </label>

                        <input
                            type="date"
                            id="birthday"
                            name="birthday"
                            class="form-control"
                            value="<?= htmlspecialchars($data['birthday']) ?>"
                        >

                    </div>


                    <div class="col-md-6">

                        <label for="age" class="form-label">
                            Age
                        </label>

                        <input
                            type="number"
                            id="age"
                            name="age"
                            class="form-control"
                            value="<?= htmlspecialchars($data['age']) ?>"
                            min="1"
                            max="120"
                        >

                    </div>


                    <div class="col-md-6">

                        <label for="degree" class="form-label">
                            Degree
                        </label>

                        <input
                            type="text"
                            id="degree"
                            name="degree"
                            class="form-control"
                            value="<?= htmlspecialchars($data['degree']) ?>"
                        >

                    </div>


                    <div class="col-md-6">

                        <label for="certification" class="form-label">
                            Certifications
                        </label>

                        <input
                            type="text"
                            id="certification"
                            name="certification"
                            class="form-control"
                            value="<?= htmlspecialchars($data['certification']) ?>"
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

                            <option
                                value="1"
                                <?= ($data['freelance'] == 1) ? 'selected' : '' ?>
                            >
                                Available
                            </option>

                            <option
                                value="0"
                                <?= ($data['freelance'] == 0) ? 'selected' : '' ?>
                            >
                                Not Available
                            </option>

                        </select>

                    </div>

                </div>


                <!-- Buttons -->

                <div class="d-flex gap-2 pt-3 border-top">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-check-lg me-1"></i>
                        Update About
                    </button>


                    <a
                        href="about.php"
                        class="btn btn-secondary"
                    >
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