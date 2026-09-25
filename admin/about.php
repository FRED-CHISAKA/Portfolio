<?php 
    include "../include/config.php"; 
    include "header.php"; 
    include "sidebar.php"; 

    // Get current user information
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
                <?php if (!empty($data)) { ?>
                    <a href="edit-about.php?id=<?= $data['id'] ?>" class="btn btn-info btn-rounded">
                        <i class="fa fa-pencil"></i>
                        Edit About
                    </a>

                <?php } else { ?>

                    <a href="add-about.php" class="btn btn-primary btn-rounded">
                        <i class="fa fa-plus"></i>
                        Add About
                    </a>

                <?php } ?>
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
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

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

                        <input type="text" id="name" name="name" class="form-control" value="<?= htmlspecialchars($data['name']) ?>" required >
                    </div>

                    <!-- Professional Title -->
                    <div class="col-md-6">
                        <label for="title" class="form-label">
                            Professional Title
                        </label>

                        <input type="text" id="title" name="title" class="form-control"
                            value="<?= htmlspecialchars($data['title']) ?>" 
                            placeholder="e.g. Software Engineer" required
                        >
                    </div>

                    <!-- Slogan -->
                    <div class="col-12">
                        <label for="slogan" class="form-label">
                            Career Objective
                        </label>

                        <textarea id="slogan" name="slogan" class="form-control" rows="4" placeholder="Write your professional introduction...">
                            <?= htmlspecialchars($data['slogan']) ?>
                        </textarea>

                        <div class="form-text">
                            This will appear as your introductory statement on the About page.
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

                        <input type="email" id="email" name="email" class="form-control"
                            value="<?= htmlspecialchars($data['email']) ?>"
                        >
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">
                        <label for="phone" class="form-label">
                            Phone Number
                        </label>

                        <input type="text" id="phone" name="phone" class="form-control"
                            value="<?= htmlspecialchars($data['phone']) ?>"
                        >
                    </div>

                    <!-- Website -->
                    <div class="col-md-6">
                        <label for="website" class="form-label">
                            Website
                        </label>

                        <input type="url" id="website" name="website" class="form-control"
                            value="<?= htmlspecialchars($data['website']) ?>"
                            placeholder="https://example.com"
                        >
                    </div>

                    <!-- City -->
                    <div class="col-md-6">
                        <label for="city" class="form-label">
                            City
                        </label>

                        <input type="text" id="city" name="city" class="form-control"
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

                        <input type="date" id="birthday" name="birthday" class="form-control"
                            value="<?= htmlspecialchars($data['birthday']) ?>"
                        >
                    </div>

                    <!-- Age -->
                    <div class="col-md-6">
                        <label for="age" class="form-label">
                            Age
                        </label>

                        <input type="number" id="age" name="age" class="form-control"
                            value="<?= htmlspecialchars($data['age']) ?>"
                            min="1" max="120"
                        >
                    </div>

                    <!-- Degree -->
                    <div class="col-md-6">
                        <label for="degree" class="form-label">
                            Degree
                        </label>

                        <input type="text" id="degree" name="degree" class="form-control"
                            value="<?= htmlspecialchars($data['degree']) ?>"
                            placeholder="e.g. BSc Software Engineering"
                        >
                    </div>

                    <!-- Certifications -->
                    <div class="col-md-6">
                        <label for="certification" class="form-label">
                            Certifications
                        </label>

                        <input type="text" id="certification" name="certification" class="form-control"
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

                        <select name="freelance" id="freelance" class="form-select">
                            <option value="1"
                                <?= ($data['freelance'] == 1) ? 'selected' : '' ?>
                            >
                                Available
                            </option>

                            <option value="0"
                                <?= ($data['freelance'] == 0) ? 'selected' : '' ?>
                            >
                                Not Available
                            </option>
                        </select>
                    </div>
                </div>

                <!-- STATISTICS -->

                <div class="border-bottom pb-2 mb-4">
                    <h5 class="mb-0">
                        <i class="bi bi-bar-chart me-2"></i>
                        Statistics
                    </h5>
                </div>

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Website Statistics</h5>
                            <p class="text-muted small mb-0">
                                Manage the statistics displayed on your About page.
                            </p>
                        </div>

                        <a href="add-counter.php" class="btn btn-primary btn-sm btn-rounded">
                            <i class="fa fa-plus"></i> Add Statistic
                        </a>
                    </div>

                    <div class="card-body">
                        <?php
                            $counter_sql = "SELECT * FROM `counter` ORDER BY `id` ASC";
                            $counter_result = mysqli_query($conn, $counter_sql);
                        ?>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Icon</th>
                                        <th>Title</th>
                                        <th>Start Value</th>
                                        <th>End Value</th>
                                        <th>Preview</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if(mysqli_num_rows($counter_result) > 0){ ?>
                                        <?php while($counter = mysqli_fetch_assoc($counter_result)){ ?>

                                            <tr>
                                                <td>
                                                    <?= $counter['id'] ?>
                                                </td>
                                                <td>
                                                    <i class="<?= htmlspecialchars($counter['icon']) ?>"></i>
                                                    <small class="text-muted ml-2">
                                                        <?= htmlspecialchars($counter['icon']) ?>
                                                    </small>
                                                </td>
                                                <td>
                                                    <strong>
                                                        <?= htmlspecialchars($counter['title']) ?>
                                                    </strong>
                                                </td>

                                                <td>
                                                    <?= htmlspecialchars($counter['pre']) ?>
                                                </td>

                                                <td>
                                                    <?= htmlspecialchars($counter['post']) ?>
                                                </td>

                                                <td>
                                                    <strong>
                                                        <?= htmlspecialchars($counter['pre']) ?>
                                                        <?= htmlspecialchars($counter['post']) ?>
                                                    </strong>
                                                    <br>
                                                    <small class="text-muted">
                                                        <?= htmlspecialchars($counter['title']) ?>
                                                    </small>
                                                </td>

                                                <td class="text-right">

                                                    <a href="edit-counter.php?id=<?= $counter['id'] ?>"
                                                    class="btn btn-sm btn-info"
                                                    title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <a href="delete-counter.php?id=<?= $counter['id'] ?>"
                                                    class="btn btn-sm btn-danger"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this statistic?');">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php } ?>

                                    <?php } else { ?>

                                    <tr>
                                        <td colspan="7" class="text-center text-muted">
                                            No statistics found.
                                        </td>
                                    </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- SKILLS MANAGEMENT -->

                <div class="border-bottom pb-2 mb-4">
                    <h5 class="mb-0">
                        <i class="bi bi-lightning me-2"></i>
                        Skills
                    </h5>
                </div>

                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">Skills & Expertise</h5>
                            <p class="text-muted small mb-0">
                                Manage the skills displayed on your About page.
                            </p>
                        </div>

                        <a href="add-skill.php" class="btn btn-primary btn-sm btn-rounded">
                            <i class="fa fa-plus"></i> Add Skill
                        </a>
                    </div>

                    <div class="card-body">

                        <?php
                            $skills_sql = "SELECT * FROM `skills` ORDER BY `id` ASC";
                            $skills_result = mysqli_query($conn, $skills_sql);
                        ?>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Icon</th>
                                        <th>Skill</th>
                                        <th>Color</th>
                                        <th>Preview</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if(mysqli_num_rows($skills_result) > 0){ ?>

                                        <?php while($skill = mysqli_fetch_assoc($skills_result)){ ?>

                                            <tr>
                                                <td>
                                                    <?= $skill['id'] ?>
                                                </td>

                                                <td>
                                                    <i class="<?= htmlspecialchars($skill['icon']) ?>"
                                                    style="color: <?= htmlspecialchars($skill['color']) ?>; font-size:20px;">
                                                    </i>

                                                    <small class="text-muted ml-2">
                                                        <?= htmlspecialchars($skill['icon']) ?>
                                                    </small>
                                                </td>

                                                <td>
                                                    <strong>
                                                        <?= htmlspecialchars($skill['title']) ?>
                                                    </strong>
                                                </td>

                                                <td>
                                                    <span class="badge badge-light">
                                                        <?= htmlspecialchars($skill['color']) ?>
                                                    </span>
                                                </td>

                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <i class="<?= htmlspecialchars($skill['icon']) ?>"
                                                        style="color: <?= htmlspecialchars($skill['color']) ?>; font-size:24px;">
                                                        </i>

                                                        <span class="ml-2">
                                                            <?= htmlspecialchars($skill['title']) ?>
                                                        </span>
                                                    </div>
                                                </td>

                                                <td class="text-right">
                                                    <a href="edit-skill.php?id=<?= $skill['id'] ?>"
                                                    class="btn btn-sm btn-info"
                                                    title="Edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>

                                                    <a href="delete-skill.php?id=<?= $skill['id'] ?>"
                                                    class="btn btn-sm btn-danger"
                                                    title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this skill?');">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        <?php } ?>

                                    <?php } else { ?>

                                    <tr>
                                        <td colspan="6" class="text-center text-muted">
                                            No skills found.
                                        </td>
                                    </tr>

                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- TESTIMONIALS -->
                <?php include 'quote-functions.php'; ?>

                <div class="border-bottom pb-2 mb-4">
                    <h5 class="mb-0">
                        <i class="bi bi-chat-quote me-2"></i>
                        Testimonials
                    </h5>
                </div>

                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1">
                                Client Testimonials
                            </h5>

                            <p class="text-muted small mb-0">
                                Manage testimonials displayed on your About page.
                            </p>
                        </div>

                        <a href="add-quote.php" class="btn btn-primary btn-sm btn-rounded">
                            <i class="fa fa-plus"></i>
                            Add Testimonial
                        </a>
                    </div>

                    <div class="card-body">
                        <?php
                            $quotes_sql = "SELECT * FROM quotes ORDER BY id DESC";
                            $quotes_result = mysqli_query($conn, $quotes_sql);
                        ?>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Client</th>
                                        <th>Position</th>
                                        <th>Company</th>
                                        <th>Testimonial</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php if (mysqli_num_rows($quotes_result) > 0): ?>
                                    <?php while ($quote = mysqli_fetch_assoc($quotes_result)): ?>
                                        <tr>
                                            <td>
                                                <?= (int)$quote['id'] ?>
                                            </td>

                                            <td>
                                                <?php if (!empty($quote['img'])): ?>
                                                    <img src="<?= htmlspecialchars(quoteImagePath($quote['img'])) ?>"
                                                        alt="<?= htmlspecialchars($quote['name']) ?>"
                                                        style="width:45px; height:45px; object-fit:cover; border-radius:50%;"
                                                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                                                    >

                                                    <div
                                                        style="width:45px; height:45px; border-radius:50%; background:#f1f1f1; display:none;
                                                            align-items:center; justify-content:center;
                                                        "
                                                    >
                                                        <i class="fa fa-user text-muted"></i>
                                                    </div>

                                                <?php else: ?>
                                                    <div
                                                        style="width:45px; height:45px; border-radius:50%; background:#f1f1f1;
                                                            display:flex; align-items:center; justify-content:center;
                                                        "
                                                    >
                                                        <i class="fa fa-user text-muted"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <strong>
                                                    <?= htmlspecialchars($quote['name']) ?>
                                                </strong>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($quote['title']) ?>
                                            </td>

                                            <td>
                                                <?= htmlspecialchars($quote['company']) ?>
                                            </td>

                                            <td style="max-width:350px;">
                                                <?= htmlspecialchars($quote['quote']) ?>
                                            </td>

                                            <td class="text-right">

                                                <a href="edit-quote.php?id=<?= (int)$quote['id'] ?>" class="btn btn-sm btn-info" title="Edit">
                                                    <i class="fa fa-pencil"></i>
                                                </a>

                                                <a href="delete-quote.php?id=<?= (int)$quote['id'] ?>" class="btn btn-sm btn-danger" title="Delete"
                                                    onclick="return confirm('Are you sure you want to delete this testimonial?');"
                                                >
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">
                                            No testimonials found.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="d-flex gap-2 pt-3 border-top">

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i>
                        Save Changes
                    </button>

                    <button type="reset" class="btn btn-secondary">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>