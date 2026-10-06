
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

            if ($certifications_result && mysqli_num_rows($certifications_result) > 0) {

                while ($certification = mysqli_fetch_assoc($certifications_result)) {

                    /*
                     * Certificate file
                     */
                    $certificate_file = trim($certification['img']);

                    /*
                     * Get file extension
                     */
                    $file_extension = strtolower(
                        pathinfo($certificate_file, PATHINFO_EXTENSION)
                    );

                    /*
                     * Determine whether certificate is an image or document
                     */
                    $image_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                    $is_image = in_array($file_extension, $image_extensions);

                    /*
                     * Generate a unique ID for the modal
                     */
                    $modal_id = 'certificateModal' . $certification['id'];

            ?>

                <!-- Certification -->
                <div class="col-lg-4 col-md-6 certifications-item"
                     data-aos="fade-up"
                     data-aos-delay="100">

                    <div class="service-item position-relative h-100">

                        <!-- Certificate Thumbnail -->
                        <div class="certificate-thumbnail mb-3">

                            <?php if (!empty($certificate_file) && $is_image) { ?>

                                <!-- Image Certificate -->
                                <img
                                    src="<?= htmlspecialchars($certificate_file) ?>"
                                    alt="<?= htmlspecialchars($certification['title']) ?>"
                                    class="img-fluid certificate-thumb-image"
                                >

                            <?php } elseif (!empty($certificate_file)) { ?>

                                <!-- Document Certificate -->
                                <div class="certificate-document-thumbnail">

                                    <?php if ($file_extension === 'pdf') { ?>

                                        <i class="bi bi-file-earmark-pdf"></i>

                                        <span>PDF Certificate</span>

                                    <?php } else { ?>

                                        <i class="bi bi-file-earmark-text"></i>

                                        <span>
                                            <?= strtoupper(htmlspecialchars($file_extension)) ?>
                                            Document
                                        </span>

                                    <?php } ?>

                                </div>

                            <?php } else { ?>

                                <!-- No Certificate File -->
                                <div class="certificate-no-thumbnail">
                                    <i class="bi bi-patch-check"></i>
                                    <span>Certificate</span>
                                </div>

                            <?php } ?>

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
                                <?= date(
                                    'F Y',
                                    strtotime($certification['issue_date'])
                                ) ?>
                            </p>

                        <?php } ?>


                        <!-- Credential ID -->
                        <?php if (!empty($certification['credential_id'])) { ?>

                            <p class="mb-2">
                                <strong>Credential ID:</strong>
                                <?= htmlspecialchars(
                                    $certification['credential_id']
                                ) ?>
                            </p>

                        <?php } ?>


                        <!-- Description -->
                        <?php if (!empty($certification['description'])) { ?>

                            <p>
                                <?= htmlspecialchars(
                                    $certification['description']
                                ) ?>
                            </p>

                        <?php } ?>


                        <!-- Links -->
                        <div class="mt-3 d-flex flex-wrap gap-2">

                            <?php if (!empty($certificate_file)) { ?>

                                <!-- View Certificate Button -->
                                <button
                                    type="button"
                                    class="btn btn-outline-secondary btn-sm btn-view"
                                    data-bs-toggle="modal"
                                    data-bs-target="#<?= $modal_id ?>"
                                >

                                    <?php if ($is_image) { ?>

                                        <i class="bi bi-image me-1"></i>

                                    <?php } else { ?>

                                        <i class="bi bi-file-earmark-text me-1"></i>

                                    <?php } ?>

                                    View Certificate

                                </button>

                            <?php } ?>


                            <?php if (!empty($certification['url'])) { ?>

                                <!-- Verify Certificate -->
                                <a
                                    href="<?= htmlspecialchars(
                                        $certification['url']
                                    ) ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    class="btn btn-primary btn-sm btn-verify"
                                >

                                    <i class="bi bi-patch-check me-1"></i>

                                    Verify Certificate

                                </a>

                            <?php } ?>

                        </div>

                    </div>
                </div>


                <!-- ==========================================
                     CERTIFICATE VIEW MODAL
                     ========================================== -->

                <?php if (!empty($certificate_file)) { ?>

                    <div
                        class="modal fade"
                        id="<?= $modal_id ?>"
                        tabindex="-1"
                        aria-labelledby="<?= $modal_id ?>Label"
                        aria-hidden="true"
                    >

                        <div class="modal-dialog modal-xl modal-dialog-centered">

                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">

                                    <h5
                                        class="modal-title"
                                        id="<?= $modal_id ?>Label"
                                    >
                                        <?= htmlspecialchars(
                                            $certification['title']
                                        ) ?>
                                    </h5>

                                    <button
                                        type="button"
                                        class="btn-close"
                                        data-bs-dismiss="modal"
                                        aria-label="Close"
                                    ></button>

                                </div>


                                <!-- Modal Body -->
                                <div class="modal-body certificate-viewer">

                                    <?php if ($is_image) { ?>

                                        <!-- IMAGE VIEWER -->

                                        <img
                                            src="<?= htmlspecialchars(
                                                $certificate_file
                                            ) ?>"
                                            alt="<?= htmlspecialchars(
                                                $certification['title']
                                            ) ?>"
                                            class="img-fluid certificate-full-image"
                                        >

                                    <?php } elseif ($file_extension === 'pdf') { ?>

                                        <!-- PDF VIEWER -->

                                        <iframe
                                            src="<?= htmlspecialchars(
                                                $certificate_file
                                            ) ?>"
                                            class="certificate-pdf-viewer"
                                            title="<?= htmlspecialchars(
                                                $certification['title']
                                            ) ?>"
                                        ></iframe>

                                    <?php } else { ?>

                                        <!-- OTHER DOCUMENT -->

                                        <div class="document-viewer-message">

                                            <i class="bi bi-file-earmark-text"></i>

                                            <h4>
                                                Document Certificate
                                            </h4>

                                            <p>
                                                This document cannot be
                                                displayed directly in the
                                                browser.
                                            </p>

                                            <a
                                                href="<?= htmlspecialchars(
                                                    $certificate_file
                                                ) ?>"
                                                target="_blank"
                                                class="btn btn-primary"
                                            >
                                                <i class="bi bi-download me-1"></i>
                                                Open / Download Document
                                            </a>

                                        </div>

                                    <?php } ?>

                                </div>


                                <!-- Modal Footer -->
                                <div class="modal-footer">

                                    <?php if ($file_extension === 'pdf' || $is_image) { ?>

                                        <!-- Download -->
                                        <a
                                            href="<?= htmlspecialchars(
                                                $certificate_file
                                            ) ?>"
                                            download
                                            class="btn btn-primary"
                                        >

                                            <i class="bi bi-download me-1"></i>

                                            Download Certificate

                                        </a>

                                    <?php } ?>

                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        data-bs-dismiss="modal"
                                    >
                                        Close
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>

                <?php } ?>

            <?php

                }

            } else {

            ?>

                <!-- Empty State -->
                <div
                    class="col-12 text-center"
                    data-aos="fade-up"
                >

                    <div class="p-5">

                        <i class="bi bi-patch-question display-4 text-muted"></i>

                        <h3 class="mt-3">
                            No Certifications Found
                        </h3>

                        <p class="text-muted">
                            Certification information will be displayed
                            here once available.
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