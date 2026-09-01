
<?php 

include 'include/config.php';

$sql = "SELECT * FROM `users` WHERE `users`.`id` = 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title><?=$data['name']?> - <?=$data['title']?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <h1 class="sitename"><?=$data['name']?></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="resume.php">Resume</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="portfolio.php">Portfolio</a></li>
          <li><a href="certifications.php" class="active">Certifications</a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1>Certifications</h1>

                        <p class="mb-0">
                            Professional certifications and credentials
                            demonstrating my technical knowledge and expertise.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li class="current">
                        Certifications
                    </li>
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
            $certifications_sql = "
                SELECT *
                FROM certifications
                WHERE status = 1
                ORDER BY issue_date DESC
            ";

            $certifications_result =
                mysqli_query($conn, $certifications_sql);
            ?>

            <div class="row gy-4">

                <?php

                if (
                    $certifications_result &&
                    mysqli_num_rows($certifications_result) > 0
                ) {

                    while (
                        $certification =
                        mysqli_fetch_assoc($certifications_result)
                    ) {

                ?>

                    <!-- Certification -->
                    <div
                        class="col-lg-4 col-md-6"
                        data-aos="fade-up"
                        data-aos-delay="100"
                    >

                        <div class="service-item position-relative h-100">

                            <!-- Certificate Icon -->
                            <div class="icon">
                                <i class="bi bi-patch-check"></i>
                            </div>

                            <!-- Title -->
                            <h3>
                                <?= htmlspecialchars(
                                    $certification['title']
                                ) ?>
                            </h3>

                            <!-- Issuer -->
                            <p class="mb-2">
                                <strong>
                                    Issued by:
                                </strong>

                                <?= htmlspecialchars(
                                    $certification['issuer']
                                ) ?>
                            </p>

                            <!-- Issue Date -->
                            <?php if (!empty($certification['issue_date'])) { ?>

                                <p class="mb-2">
                                    <strong>
                                        Issued:
                                    </strong>

                                    <?= date(
                                        'F Y',
                                        strtotime(
                                            $certification['issue_date']
                                        )
                                    ) ?>

                                </p>

                            <?php } ?>

                            <!-- Credential ID -->
                            <?php if (!empty($certification['credential_id'])) { ?>

                                <p class="mb-2">

                                    <strong>
                                        Credential ID:
                                    </strong>

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
                            <div class="mt-3">

                                <?php if (!empty($certification['url'])) { ?>

                                    <a
                                        href="<?= htmlspecialchars(
                                            $certification['url']
                                        ) ?>"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="btn btn-primary btn-sm"
                                    >
                                        <i class="bi bi-patch-check me-1"></i>
                                        Verify Certificate
                                    </a>

                                <?php } ?>

                                <?php if (!empty($certification['img'])) { ?>

                                    <a
                                        href="<?= htmlspecialchars(
                                            $certification['img']
                                        ) ?>"
                                        target="_blank"
                                        class="btn btn-outline-secondary btn-sm"
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
                    <div
                        class="col-12 text-center"
                        data-aos="fade-up"
                    >
                        <div class="p-5">

                            <i
                                class="bi bi-patch-question display-4 text-muted"
                            ></i>

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
    <!-- /Certifications Section -->
  </main>


  <footer id="footer" class="footer dark-background">
    <div class="container">
      <h3 class="sitename"><?=$data['name']?></h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-skype"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
      <div class="container">
        <div class="copyright">
          <span>Copyright</span> <strong class="px-1 sitename">Chisaka Fred Portfolio</strong> <span>All Rights Reserved</span>
        </div>
        <div class="credits">
          <?php 
          $details = "SELECT * FROM `details` WHERE `details`.`id` = 1";
          $details_results = mysqli_query($conn, $details);
          $details_data = mysqli_fetch_assoc($details_results);
          
          ?>

          Designed by <a href="https://techdive.com/"><?=$data['name']?></a> | <a href="<?=$details_data['url'] ?>" target="_blank"><?= $details_data['company'] ?></a>  
        </div>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>