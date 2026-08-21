<?php 

include "../include/config.php"; 
include "header.php"; 
include "sidebar.php"; 


// Get current user/profile information
$sql = "SELECT * FROM users WHERE id = 1"; 
$result = mysqli_query($conn, $sql); 
$data = mysqli_fetch_assoc($result); 

?>

<!-- Main Content -->
<div class="page-wrapper">
    <!-- Page Header -->
     <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">About</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="add-Services.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Edit About</a>
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
                Update the information displayed on your website.
            </p>

        </div>


        <!-- Card Body -->
        <div class="card-body p-4">

            <form action="about-update.php" method="POST">

                <input 
                    type="hidden" 
                    name="id" 
                    value="<?= $data['id'] ?>"
                >


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
                            value="<?= htmlspecialchars($data['name']) ?>" 
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
                            value="<?= htmlspecialchars($data['title']) ?>" 
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
                        ><?= htmlspecialchars($data['slogan']) ?></textarea>

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
                            value="<?= htmlspecialchars($data['email']) ?>"
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
                            value="<?= htmlspecialchars($data['phone']) ?>"
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
                            value="<?= htmlspecialchars($data['website']) ?>"
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
                            value="<?= htmlspecialchars($data['birthday']) ?>"
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
                            value="<?= htmlspecialchars($data['age']) ?>"
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
                            value="<?= htmlspecialchars($data['degree']) ?>"
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
                            class="form-select"
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


                <!-- Submit Buttons -->
                <div class="d-flex gap-2 pt-3 border-top">

                    <button 
                        type="submit" 
                        class="btn btn-primary"
                    >

                        <i class="bi bi-check-lg me-1"></i>

                        Save Changes

                    </button>


                    <button 
                        type="reset" 
                        class="btn btn-secondary"
                    >

                        <i class="bi bi-arrow-counterclockwise me-1"></i>

                        Reset

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<?php 

include "footer.php"; 

?>