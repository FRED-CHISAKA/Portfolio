
<?php 

    include 'include/config.php';

    $sql = "SELECT * FROM `users` WHERE `users`.`id` = 1";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    include 'include/header.php';

?>


  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Certifications</h1>

                        <p class="mb-0">
                            Professional certifications and credentials demonstrating my technical knowledge and expertise.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Certifications</li>
                </ol>
            </div>
        </nav>
    </div>
    <!-- End Page Title -->

    <!-- Certifications Section -->
    <section id="certifications" class="services section">

        <div class="container">
            <?php
                // Get active certifications
                $certifications_sql = "SELECT * FROM certifications
                    WHERE status = 1
                    ORDER BY issue_date DESC
                ";

                $certifications_result = mysqli_query($conn, $certifications_sql);
            ?>

            <div class="row gy-4">

                <?php

                if (
                    $certifications_result && mysqli_num_rows($certifications_result) > 0
                ) {

                    while (
                        $certification = mysqli_fetch_assoc($certifications_result)
                    ) {

                ?>

                    <!-- Certification -->
                    <div class="col-lg-4 col-md-6 certifications-item" data-aos="fade-up" data-aos-delay="100">

                        <div class="service-item position-relative h-100">

                            <!-- Certificate Icon -->
                            <div class="icon">
                                <i class="bi bi-patch-check"></i>
                            </div>

                            <!-- Title -->
                            <h3>
                                <?= htmlspecialchars($certification['title']) ?>
                            </h3>

                            <!-- Issuer -->
                            <p class="mb-2">
                                <strong>Issued by:</strong>
                                <?= htmlspecialchars($certification['issuer']) ?>
                            </p>

                            <!-- Issue Date -->
                            <?php if (!empty($certification['issue_date'])) { ?>
                                <p class="mb-2">
                                    <strong>Issued:</strong>
                                    <?= date('F Y', strtotime($certification['issue_date'])) ?>
                                </p>
                            <?php } ?>

                            <!-- Credential ID -->
                            <?php if (!empty($certification['credential_id'])) { ?>
                                <p class="mb-2">
                                    <strong>Credential ID:</strong>
                                    <?= htmlspecialchars($certification['credential_id']) ?>
                                </p>
                            <?php } ?>

                            <!-- Description -->
                            <?php if (!empty($certification['description'])) { ?>
                                <p>
                                    <?= htmlspecialchars($certification['description']) ?>
                                </p>
                            <?php } ?>

                            <!-- Links -->
                            <div class="mt-3">

                                <?php if (!empty($certification['url'])) { ?>

                                    <a href="<?= htmlspecialchars($certification['url']) ?>"
                                        target="_blank" rel="noopener noreferrer"
                                        class="btn btn-primary btn-sm btn-verify"
                                    >
                                        <i class="bi bi-patch-check me-1"></i>
                                        Verify Certificate
                                    </a>

                                <?php } ?>

                                <?php if (!empty($certification['img'])) { ?>

                                    <a href="<?= htmlspecialchars($certification['img']) ?>"
                                        target="_blank" class="btn btn-outline-secondary btn-sm btn-view"
                                    >
                                        <i class="bi bi-image me-1"></i>
                                        View Certificate
                                    </a>

                                <?php } ?>
                            </div>
                        </div>
                    </div>

                <?php

                    }

                } else {
                ?>
                    <!-- Empty State -->
                    <div class="col-12 text-center" data-aos="fade-up">
                        <div class="p-5">
                            <i class="bi bi-patch-question display-4 text-muted"></i>
                            <h3 class="mt-3">
                                No Certifications Found
                            </h3>

                            <p class="text-muted">
                                Certification information will be displayed here once available.
                            </p>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </div>

    </section>
    
  </main>

<!-- FOOTER -->
  <?php include 'include/footer.php'; ?>