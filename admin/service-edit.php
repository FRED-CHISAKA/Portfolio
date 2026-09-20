<?php

include "../include/config.php";

// --------------------------------------------------
// UPDATE SERVICE
// --------------------------------------------------

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = intval($_POST['id'] ?? 0);

    $title = trim($_POST['title'] ?? '');
    $icon = trim($_POST['icon'] ?? '');
    $url = trim($_POST['url'] ?? '');
    $description = trim($_POST['description'] ?? '');

    // Validate ID
    if ($id <= 0) {
        header("Location: services.php?error=Invalid service ID");
        exit();
    }

    // Validate fields
    if (empty($title) || empty($icon) || empty($url) || empty($description)) {
        header("Location: service-edit.php?id=" . $id . "&error=Please fill in all required fields");
        exit();
    }

    // Update service
    $stmt = $conn->prepare("
        UPDATE services
        SET url = ?, icon = ?, title = ?, description = ?
        WHERE id = ?
    ");

    if (!$stmt) {
        header("Location: services.php?error=Database error");
        exit();
    }

    $stmt->bind_param(
        "ssssi",
        $url,
        $icon,
        $title,
        $description,
        $id
    );

    if ($stmt->execute()) {

        $stmt->close();

        header("Location: services.php?success=Service updated successfully");
        exit();

    } else {

        $stmt->close();

        header("Location: service-edit.php?id=" . $id . "&error=Failed to update service");
        exit();
    }
}


// --------------------------------------------------
// GET SERVICE FOR EDITING
// --------------------------------------------------

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: services.php?error=Invalid service ID");
    exit();
}

// Fetch service
$stmt = $conn->prepare("
    SELECT id, url, icon, title, description
    FROM services
    WHERE id = ?
");

if (!$stmt) {
    header("Location: services.php?error=Database error");
    exit();
}

$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {

    $stmt->close();

    header("Location: services.php?error=Service not found");
    exit();
}

$service = $result->fetch_assoc();

$stmt->close();

include "header.php";
include "sidebar.php";

?>

<!-- Main Content -->
<div class="page-wrapper">

    <div class="content">

        <!-- Page Header -->
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Edit Service</h4>
            </div>

            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="services.php"
                   class="btn btn-secondary btn-rounded float-right">
                    <i class="fa fa-arrow-left"></i>
                    Back to Services
                </a>
            </div>
        </div>


        <!-- Service Form -->
        <div class="card shadow-sm border-0">

            <div class="card-header bg-white py-3">

                <h3 class="h5 mb-1">
                    <i class="bi bi-pencil-square me-2"></i>
                    Edit Service
                </h3>

                <p class="text-muted small mb-0">
                    Update the details of this service.
                </p>

            </div>


            <div class="card-body p-4">

                <?php if (isset($_GET['error'])): ?>

                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <?= htmlspecialchars($_GET['error']); ?>
                    </div>

                <?php endif; ?>


                <form action="service-edit.php" method="POST">

                    <!-- Hidden ID -->
                    <input
                        type="hidden"
                        name="id"
                        value="<?= htmlspecialchars($service['id']); ?>"
                    >


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
                                value="<?= htmlspecialchars($service['title']); ?>"
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
                                value="<?= htmlspecialchars($service['icon']); ?>"
                                placeholder="e.g. bi bi-code-slash"
                                required
                            >

                            <div class="form-text">
                                Example:
                                <code>bi bi-code-slash</code>
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
                                value="<?= htmlspecialchars($service['url']); ?>"
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
                            ><?= htmlspecialchars($service['description']); ?></textarea>

                        </div>

                    </div>


                    <!-- Buttons -->
                    <div class="d-flex gap-2 pt-3 border-top">

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="bi bi-check-lg me-1"></i>
                            Update Service
                        </button>


                        <a
                            href="services.php"
                            class="btn btn-secondary"
                        >
                            <i class="bi bi-x-lg me-1"></i>
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


<?php

include "footer.php";

?>