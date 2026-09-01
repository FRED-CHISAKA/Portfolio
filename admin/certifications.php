<?php

include "../include/config.php";
include "header.php";
include "sidebar.php";


// Get all certifications
$sql = "
    SELECT *
    FROM certifications
    ORDER BY issue_date DESC, id DESC
";

$result = mysqli_query($conn, $sql);


// Count certifications
$total_sql = "
    SELECT COUNT(*) AS total
    FROM certifications
";

$total_result = mysqli_query($conn, $total_sql);
$total_data = mysqli_fetch_assoc($total_result);

$total_certifications = $total_data['total'];


// Count active certifications
$active_sql = "
    SELECT COUNT(*) AS total
    FROM certifications
    WHERE status = 1
";

$active_result = mysqli_query($conn, $active_sql);
$active_data = mysqli_fetch_assoc($active_result);

$active_certifications = $active_data['total'];


// Count hidden certifications
$hidden_sql = "
    SELECT COUNT(*) AS total
    FROM certifications
    WHERE status = 0
";

$hidden_result = mysqli_query($conn, $hidden_sql);
$hidden_data = mysqli_fetch_assoc($hidden_result);

$hidden_certifications = $hidden_data['total'];

?>

<!-- Main Content -->
<div class="page-wrapper">


    <!-- ========================================== -->
    <!-- PAGE HEADER -->
    <!-- ========================================== -->

    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Certifications</h4>
                <p>Manage your professional certifications and credentials.</p>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="add-Services.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Edit Resume</a>
            </div>
        </div>
    </div>


    <!-- ========================================== -->
    <!-- CERTIFICATION STATISTICS -->
    <!-- ========================================== -->

    <div class="row g-3 mb-4">


        <!-- Total Certifications -->
        <div class="col-md-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Total Certifications
                            </p>

                            <h3 class="mb-1">
                                <?= $total_certifications ?>
                            </h3>

                            <small class="text-muted">
                                All certificates
                            </small>

                        </div>


                        <div
                            class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px;"
                        >

                            <i class="bi bi-award text-primary fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Active Certifications -->
        <div class="col-md-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Active
                            </p>

                            <h3 class="mb-1">
                                <?= $active_certifications ?>
                            </h3>

                            <small class="text-muted">
                                Visible on website
                            </small>

                        </div>


                        <div
                            class="bg-success bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px;"
                        >

                            <i class="bi bi-check-circle text-success fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- Hidden Certifications -->
        <div class="col-md-4">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <p class="text-muted mb-1">
                                Hidden
                            </p>

                            <h3 class="mb-1">
                                <?= $hidden_certifications ?>
                            </h3>

                            <small class="text-muted">
                                Not visible on website
                            </small>

                        </div>


                        <div
                            class="bg-secondary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 55px; height: 55px;"
                        >

                            <i class="bi bi-eye-slash text-secondary fs-4"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ========================================== -->
    <!-- CERTIFICATIONS CARD -->
    <!-- ========================================== -->

    <div class="card shadow-sm border-0">


        <!-- Card Header -->

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <h3 class="h5 mb-1">

                        <i class="bi bi-patch-check me-2"></i>

                        All Certifications

                    </h3>

                    <p class="text-muted small mb-0">

                        View and manage the certifications displayed on your website.

                    </p>

                </div>


                <span class="badge bg-primary">

                    <?= $total_certifications ?>

                    Certification<?= $total_certifications == 1 ? '' : 's' ?>

                </span>

            </div>

        </div>


        <!-- Card Body -->

        <div class="card-body p-0">


            <?php if ($result && mysqli_num_rows($result) > 0) { ?>


                <div class="table-responsive">

                    <table class="table table-hover align-middle mb-0">


                        <thead class="table-light">

                            <tr>

                                <th style="width: 60px;">
                                    #
                                </th>

                                <th style="width: 90px;">
                                    Certificate
                                </th>

                                <th>
                                    Certification
                                </th>

                                <th>
                                    Issuing Organization
                                </th>

                                <th>
                                    Issue Date
                                </th>

                                <th>
                                    Credential ID
                                </th>

                                <th>
                                    Status
                                </th>

                                <th class="text-end">
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            <?php

                            $number = 1;

                            while ($certification = mysqli_fetch_assoc($result)) {

                            ?>


                                <tr>


                                    <!-- Number -->

                                    <td>

                                        <?= $number++ ?>

                                    </td>


                                    <!-- Certificate Image -->

                                    <td>

                                        <?php if (!empty($certification['img'])) { ?>


                                            <a
                                                href="../<?= htmlspecialchars($certification['img']) ?>"
                                                target="_blank"
                                            >

                                                <img
                                                    src="../<?= htmlspecialchars($certification['img']) ?>"
                                                    alt="<?= htmlspecialchars($certification['title']) ?>"
                                                    class="rounded border"
                                                    style="width: 70px; height: 50px; object-fit: cover;"
                                                >

                                            </a>


                                        <?php } else { ?>


                                            <div
                                                class="bg-light rounded d-flex align-items-center justify-content-center"
                                                style="width: 70px; height: 50px;"
                                            >

                                                <i class="bi bi-award text-muted fs-4"></i>

                                            </div>


                                        <?php } ?>

                                    </td>


                                    <!-- Certification -->

                                    <td>

                                        <strong>

                                            <?= htmlspecialchars(
                                                $certification['title']
                                            ) ?>

                                        </strong>


                                        <?php if (!empty($certification['description'])) { ?>

                                            <div class="small text-muted mt-1">

                                                <?= htmlspecialchars(
                                                    $certification['description']
                                                ) ?>

                                            </div>

                                        <?php } ?>

                                    </td>


                                    <!-- Issuer -->

                                    <td>

                                        <span>

                                            <?= htmlspecialchars(
                                                $certification['issuer']
                                            ) ?>

                                        </span>

                                    </td>


                                    <!-- Issue Date -->

                                    <td>

                                        <?php if (!empty($certification['issue_date'])) { ?>

                                            <?= date(
                                                'M Y',
                                                strtotime(
                                                    $certification['issue_date']
                                                )
                                            ) ?>

                                        <?php } else { ?>

                                            <span class="text-muted">
                                                N/A
                                            </span>

                                        <?php } ?>

                                    </td>


                                    <!-- Credential ID -->

                                    <td>

                                        <?php if (!empty($certification['credential_id'])) { ?>

                                            <code>

                                                <?= htmlspecialchars(
                                                    $certification['credential_id']
                                                ) ?>

                                            </code>

                                        <?php } else { ?>

                                            <span class="text-muted">
                                                N/A
                                            </span>

                                        <?php } ?>

                                    </td>


                                    <!-- Status -->

                                    <td>

                                        <?php if ($certification['status'] == 1) { ?>


                                            <span class="badge bg-success">

                                                <i class="bi bi-check-circle me-1"></i>

                                                Active

                                            </span>


                                        <?php } else { ?>


                                            <span class="badge bg-secondary">

                                                <i class="bi bi-eye-slash me-1"></i>

                                                Hidden

                                            </span>


                                        <?php } ?>

                                    </td>


                                    <!-- Actions -->

                                    <td class="text-end">

                                        <div class="btn-group">


                                            <!-- View / Verify -->

                                            <?php if (!empty($certification['url'])) { ?>

                                                <a
                                                    href="<?= htmlspecialchars(
                                                        $certification['url']
                                                    ) ?>"
                                                    target="_blank"
                                                    class="btn btn-sm btn-outline-success"
                                                    title="Verify Certificate"
                                                >

                                                    <i class="bi bi-box-arrow-up-right"></i>

                                                </a>

                                            <?php } ?>


                                            <!-- Edit -->

                                            <a
                                                href="certification-edit.php?id=<?= $certification['id'] ?>"
                                                class="btn btn-sm btn-outline-primary"
                                                title="Edit Certification"
                                            >

                                                <i class="bi bi-pencil"></i>

                                            </a>


                                            <!-- Delete -->

                                            <a
                                                href="certification-delete.php?id=<?= $certification['id'] ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                title="Delete Certification"
                                                onclick="return confirm('Are you sure you want to delete this certification?')"
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


                <!-- ========================================== -->
                <!-- EMPTY STATE -->
                <!-- ========================================== -->

                <div class="text-center py-5">


                    <i class="bi bi-patch-check fs-1 text-muted"></i>


                    <h5 class="mt-3">
                        No Certifications Found
                    </h5>


                    <p class="text-muted mb-3">

                        You have not added any certifications yet.

                    </p>


                    <a
                        href="certification-add.php"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-plus-lg me-1"></i>

                        Add Your First Certification

                    </a>


                </div>


            <?php } ?>


        </div>

    </div>


</div>


<?php

include "footer.php";

?>