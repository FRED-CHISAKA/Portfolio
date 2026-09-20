<?php

include "../include/config.php";
include "header.php";
include "sidebar.php";

// Fetch all services
$sql = "SELECT id, url, icon, title, description
        FROM services
        ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!-- Main Content -->
<div class="page-wrapper">

    <div class="content">

        <!-- Page Header -->
        <div class="row">

            <div class="col-sm-6 col-6">
                <h4 class="page-title">Services</h4>
            </div>

            <div class="col-sm-6 col-6 text-right m-b-20">

                <a href="service-add.php"
                   class="btn btn-primary btn-rounded float-right">

                    <i class="fa fa-plus"></i>
                    Add Service

                </a>

            </div>

        </div>


        <!-- Success Message -->
        <?php if (isset($_GET['success'])): ?>

            <div class="alert alert-success alert-dismissible fade show"
                 role="alert">

                <i class="bi bi-check-circle me-2"></i>

                <?= htmlspecialchars($_GET['success']); ?>

                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

        <?php endif; ?>


        <!-- Error Message -->
        <?php if (isset($_GET['error'])): ?>

            <div class="alert alert-danger alert-dismissible fade show"
                 role="alert">

                <i class="bi bi-exclamation-triangle me-2"></i>

                <?= htmlspecialchars($_GET['error']); ?>

                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

        <?php endif; ?>


        <!-- Services Card -->
        <div class="card shadow-sm border-0">

            <div class="card-header bg-white py-3">

                <div class="row align-items-center">

                    <div class="col-md-8">

                        <h3 class="h5 mb-1">
                            <i class="bi bi-grid me-2"></i>
                            Services
                        </h3>

                        <p class="text-muted small mb-0">
                            Manage the services displayed on your website.
                        </p>

                    </div>


                    <div class="col-md-4 text-md-right mt-3 mt-md-0">

                        <span class="badge badge-primary p-2">

                            <?php
                            echo $result ? $result->num_rows : 0;
                            ?>

                            Service<?php
                            echo ($result && $result->num_rows != 1) ? 's' : '';
                            ?>

                        </span>

                    </div>

                </div>

            </div>


            <div class="card-body">

                <?php if ($result && $result->num_rows > 0): ?>


                    <!-- Services List -->
                    <div class="table-responsive">

                        <table class="table table-hover mb-0">

                            <thead>

                                <tr>

                                    <th style="width: 60px;">
                                        #
                                    </th>

                                    <th style="width: 80px;">
                                        Icon
                                    </th>

                                    <th>
                                        Service
                                    </th>

                                    <th>
                                        URL
                                    </th>

                                    <th>
                                        Description
                                    </th>

                                    <th class="text-center"
                                        style="width: 150px;">

                                        Actions

                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                <?php
                                $counter = 1;

                                while ($service = $result->fetch_assoc()):
                                ?>

                                    <tr>

                                        <!-- Number -->
                                        <td>
                                            <?= $counter++; ?>
                                        </td>


                                        <!-- Icon -->
                                        <td>

                                            <div
                                                class="d-flex align-items-center justify-content-center"
                                                style="width: 45px; height: 45px;">

                                                <i class="<?= htmlspecialchars($service['icon']); ?>"
                                                   style="font-size: 28px;">
                                                </i>

                                            </div>

                                        </td>


                                        <!-- Title -->
                                        <td>

                                            <strong>
                                                <?= htmlspecialchars($service['title']); ?>
                                            </strong>

                                        </td>


                                        <!-- URL -->
                                        <td>

                                            <?php if (!empty($service['url'])): ?>

                                                <code>
                                                    <?= htmlspecialchars($service['url']); ?>
                                                </code>

                                            <?php else: ?>

                                                <span class="text-muted">
                                                    No URL
                                                </span>

                                            <?php endif; ?>

                                        </td>


                                        <!-- Description -->
                                        <td>

                                            <div style="max-width: 400px;">

                                                <?= nl2br(
                                                    htmlspecialchars(
                                                        $service['description']
                                                    )
                                                ); ?>

                                            </div>

                                        </td>


                                        <!-- Actions -->
                                        <td class="text-center">

                                            <!-- Edit -->
                                            <a
                                                href="service-edit.php?id=<?= $service['id']; ?>"
                                                class="btn btn-sm btn-primary"
                                                title="Edit Service">

                                                <i class="bi bi-pencil"></i>

                                            </a>


                                            <!-- Delete -->
                                            <form
                                                action="service-delete.php"
                                                method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this service? This action cannot be undone.');">

                                                <input
                                                    type="hidden"
                                                    name="id"
                                                    value="<?= $service['id']; ?>"
                                                >

                                                <button
                                                    type="submit"
                                                    class="btn btn-sm btn-danger"
                                                    title="Delete Service">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                <?php endwhile; ?>

                            </tbody>

                        </table>

                    </div>


                <?php else: ?>


                    <!-- Empty State -->
                    <div class="text-center py-5">

                        <div class="mb-3">

                            <i class="bi bi-grid"
                               style="font-size: 55px; color: #ccc;">
                            </i>

                        </div>


                        <h5 class="text-muted">
                            No Services Found
                        </h5>


                        <p class="text-muted mb-4">
                            You have not added any services yet.
                            Start by adding your first service.
                        </p>


                        <a href="service-add.php"
                           class="btn btn-primary btn-rounded">

                            <i class="fa fa-plus"></i>
                            Add Your First Service

                        </a>

                    </div>


                <?php endif; ?>

            </div>

        </div>

    </div>

</div>


<?php

include "footer.php";

?>
