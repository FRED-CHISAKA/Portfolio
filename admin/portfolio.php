<?php

    include "../include/config.php";
    include "header.php";
    include "sidebar.php";

    $delete_message = "";
    $delete_error = "";

    if (isset($_GET['deleted'])) {

        if ($_GET['deleted'] === 'success') {
            $delete_message = "Portfolio project deleted successfully.";

        } elseif ($_GET['deleted'] === 'error') {
            $delete_error = "Failed to delete the portfolio project.";
        }
    }

    // GET ALL PORTFOLIO PROJECTS
    $portfolio_sql = "SELECT portfolio.*, portfolio.title AS category_name
        FROM portfolio LEFT JOIN category ON portfolio.category = category.id
        ORDER BY portfolio.id DESC
    ";

    $portfolio_result = mysqli_query($conn, $portfolio_sql);

    // TOTAL PROJECTS
    $total_projects_sql = "SELECT COUNT(*) AS total FROM portfolio";

    $total_projects_result = mysqli_query($conn, $total_projects_sql);
    $total_projects_data = mysqli_fetch_assoc($total_projects_result);

    $total_projects = $total_projects_data['total'];

    // CLOUD SYSTEMS
    $cloud_sql = "SELECT COUNT(*) AS total FROM portfolio p
        INNER JOIN portfolio c ON p.category = c.id
        WHERE LOWER(c.title) LIKE '%cloud%'
    ";

    $cloud_result = mysqli_query($conn, $cloud_sql);
    $cloud_data = mysqli_fetch_assoc($cloud_result);

    $cloud_projects = $cloud_data['total'];

    // CYBERSECURITY
    $cybersecurity_sql = "SELECT COUNT(*) AS total FROM portfolio p
        INNER JOIN portfolio c ON p.category = c.id
        WHERE LOWER(c.title) LIKE '%cyber%'
    ";

    $cybersecurity_result = mysqli_query($conn, $cybersecurity_sql);
    $cybersecurity_data = mysqli_fetch_assoc($cybersecurity_result);

    $cybersecurity_projects = $cybersecurity_data['total'];

    // IT INFRASTRUCTURE / ACTIVE SYSTEMS
    $systems_sql = "SELECT COUNT(*) AS total FROM portfolio p
        INNER JOIN portfolio c ON p.category = c.id
        WHERE LOWER(c.title) LIKE '%infrastructure%'
    ";

    $systems_result = mysqli_query($conn, $systems_sql);
    $systems_data = mysqli_fetch_assoc($systems_result);

    $active_systems = $systems_data['total'];

    // GET CATEGORIES
    $categories_sql = "SELECT * FROM portfolio ORDER BY title ASC";

    $categories_result = mysqli_query($conn, $categories_sql);

?>

<!-- Main Content -->
<div class="page-wrapper">
    <!-- Page Header -->
     <div class="content">

        <?php if (!empty($delete_message)) { ?>

        <div class="alert alert-success alert-dismissible fade show">
            <i class="bi bi-check-circle me-2"></i>
            <?= htmlspecialchars($delete_message) ?>

            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>

        <?php } ?>

        <?php if (!empty($delete_error)) { ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="bi bi-exclamation-triangle me-2"></i>
                <?= htmlspecialchars($delete_error) ?>

                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Portfolio</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="portfolio-add.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Portfolio</a>
            </div>
        </div>
     </div>

    <!-- PROJECT STATISTICS -->
    <div class="row g-3 mb-4">

        <!-- Total Projects -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Total Projects</p>
                            <h3 class="mb-1"><?= $total_projects ?></h3>
                            <small class="text-muted">Portfolio projects</small>
                        </div>

                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px;"
                        >
                            <i class="bi bi-code-slash text-primary fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cloud Systems -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Cloud Systems</p>
                            <h3 class="mb-1"><?= $cloud_projects ?></h3>
                            <small class="text-muted">Cloud & DevOps projects</small>
                        </div>

                        <div class="bg-info bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px;"
                        >
                            <i class="bi bi-cloud text-info fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cybersecurity -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Cybersecurity</p>
                            <h3 class="mb-1"><?= $cybersecurity_projects ?></h3>
                            <small class="text-muted">Security projects</small>
                        </div>

                        <div class="bg-danger bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px;"
                        >
                            <i class="bi bi-shield-lock text-danger fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Systems -->
        <div class="col-md-6 col-lg-6 col-xl-3">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Active Systems</p>
                            <h3 class="mb-1"><?= $active_systems ?></h3>
                            <small class="text-muted">IT infrastructure projects</small>
                        </div>

                        <div class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px;"
                        >
                            <i class="bi bi-laptop text-success fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- PORTFOLIO PROJECTS -->
    <div class="card shadow-sm border-0 mb-4">
        <!-- Card Header -->
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h3 class="h5 mb-1">
                        <i class="bi bi-briefcase me-2"></i>
                        Portfolio Projects
                    </h3>

                    <p class="text-muted small mb-0">
                        View and manage all projects displayed on your portfolio.
                    </p>
                </div>

                <span class="badge bg-primary">
                    <?= $total_projects ?>
                    Projects
                </span>
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body p-0">
            <?php if ($portfolio_result && mysqli_num_rows($portfolio_result) > 0) { ?>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 60px;">#</th>
                                <th style="width: 90px;">Image</th>
                                <th>Project</th>
                                <th>Category</th>
                                <th>Technology</th>
                                <th>URL</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $number = 1;
                                while ($portfolio = mysqli_fetch_assoc($portfolio_result)) {
                            ?>

                                <tr>
                                    <!-- Number -->
                                    <td><?= $number++ ?></td>
                                    <!-- Image -->
                                    <td>
                                        <?php if (!empty($portfolio['img'])) { ?>
                                            <img
                                                src="../<?= htmlspecialchars($portfolio['img']) ?>"
                                                alt="<?= htmlspecialchars($portfolio['title']) ?>"
                                                class="rounded" style="width: 65px; height: 50px; object-fit: cover;"
                                            >

                                        <?php } else { ?>
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                                style="width: 65px; height: 50px;"
                                            >
                                                <i class="bi bi-image text-muted"></i>
                                            </div>
                                        <?php } ?>
                                    </td>

                                    <!-- Project -->
                                    <td>
                                        <strong>
                                            <?= htmlspecialchars($portfolio['title']) ?>
                                        </strong>

                                        <div class="small text-muted mt-1">
                                            <?= htmlspecialchars($portfolio['description']) ?>
                                        </div>
                                    </td>

                                    <!-- Category -->
                                    <td>
                                        <?php if (!empty($portfolio['category_name'])) { ?>
                                            <span class="badge bg-secondary">
                                                <?= htmlspecialchars($portfolio['category_name']) ?>
                                            </span>

                                        <?php } else { ?>
                                            <span class="text-muted">Uncategorized</span>
                                        <?php } ?>
                                    </td>

                                    <!-- Technology -->
                                    <td>
                                        <span class="text-muted">
                                            <?= htmlspecialchars($portfolio['technology']) ?>
                                        </span>
                                    </td>

                                    <!-- URL -->
                                    <td>
                                        <?php if (!empty($portfolio['url'])) { ?>

                                            <a href="<?= htmlspecialchars($portfolio['url']) ?>"
                                                target="_blank" class="text-decoration-none"
                                            >
                                                <i class="bi bi-box-arrow-up-right me-1"></i>
                                                View
                                            </a>

                                        <?php } else { ?>
                                            <span class="text-muted">N/A</span>
                                        <?php } ?>
                                    </td>

                                    <!-- Actions -->
                                    <td class="text-end">
                                        <div class="btn-group">

                                            <!-- Edit -->
                                            <a href="portfolio-edit.php?id=<?= $portfolio['id'] ?>"
                                                class="btn btn-sm btn-outline-primary" title="Edit Project"
                                            >
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <!-- Delete -->
                                            <a href="portfolio-delete.php?id=<?= $portfolio['id'] ?>"
                                                class="btn btn-sm btn-outline-danger" title="Delete Project"
                                                onclick="return confirm('Are you sure you want to delete this project?')"
                                            >
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            <?php } else { ?>

                <!-- Empty State -->
                <div class="text-center py-5">
                    <i class="bi bi-briefcase fs-1 text-muted"></i>
                    <h5 class="mt-3">No Projects Found</h5>
                    <p class="text-muted mb-3">
                        You have not added any portfolio projects yet.
                    </p>

                    <a href="portfolio-add.php" class="btn btn-primary">
                        <i class="bi bi-plus-lg me-1"></i>
                        Add Your First Project
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- CATEGORIES -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <div>
                    <h3 class="h5 mb-1">
                        <i class="bi bi-tags me-2"></i>
                        Portfolio Categories
                    </h3>

                    <p class="text-muted small mb-0">
                        Manage the categories used to organize your projects.
                    </p>
                </div>


                <a href="category-add.php" class="btn btn-outline-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i>
                    Add Category
                </a>
            </div>
        </div>

        <div class="card-body">
            <?php if ($categories_result && mysqli_num_rows($categories_result) > 0) { ?>

                <div class="row g-3">
                    <?php while ($category = mysqli_fetch_assoc($categories_result)) { ?>

                        <?php
                            // Count projects in this category
                            $category_id = $category['id'];

                            $category_count_sql = "
                                SELECT COUNT(*) AS total FROM portfolio
                                WHERE category = '$category_id'
                            ";

                            $category_count_result = mysqli_query($conn, $category_count_sql);
                            $category_count_data = mysqli_fetch_assoc($category_count_result);

                            $category_count = $category_count_data['total'];
                        ?>

                        <div class="col-md-6 col-lg-4">
                            <div class="border rounded p-3 h-100">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">
                                            <?= htmlspecialchars($category['title']) ?>
                                        </h6>

                                        <span class="text-muted small">
                                            <?= $category_count ?>
                                            project<?= $category_count == 1 ? '' : 's' ?>
                                        </span>
                                    </div>

                                    <div>
                                        <a href="category-edit.php?id=<?= $category['id'] ?>"
                                            class="btn btn-sm btn-outline-primary" title="Edit Category"
                                        >
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <a href="category-delete.php?id=<?= $category['id'] ?>"
                                            class="btn btn-sm btn-outline-danger" title="Delete Category"
                                            onclick="return confirm('Delete this category? Projects using this category may be affected. Continue?')"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>

            <?php } else { ?>
                <div class="text-center py-4">
                    <i class="bi bi-tags fs-1 text-muted"></i>

                    <p class="text-muted mt-3 mb-3">
                        No portfolio categories have been created yet.
                    </p>

                    <a href="category-add.php"class="btn btn-primary">
                        <i class="bi bi-plus-lg me-1"></i>
                        Add Category
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
</main>

<?php include "footer.php"; ?>