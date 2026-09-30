<?php

  // Get current page
  $current_page = basename($_SERVER['PHP_SELF']);

  // Set page title
  $page_title = $data['name'] . " - " . $data['title'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$page_title?></title>

  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/custom.css" rel="stylesheet">

</head>

<body class="<?=pathinfo($current_page, PATHINFO_FILENAME)?>-page">

  <!-- Header -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <h1 class="sitename"><?=$data['name']?></h1>
      </a>

      <nav id="navmenu" class="navmenu">

        <ul>

          <li>
            <a href="index.php"
              class="<?=($current_page == 'index.php') ? 'active' : ''?>">
              Home
            </a>
          </li>

          <li>
            <a href="about.php"
              class="<?=($current_page == 'about.php') ? 'active' : ''?>">
              About
            </a>
          </li>

          <li>
            <a href="resume.php"
              class="<?=($current_page == 'resume.php') ? 'active' : ''?>">
              Resume
            </a>
          </li>

          <li>
            <a href="services.php"
              class="<?=($current_page == 'services.php') ? 'active' : ''?>">
              Services
            </a>
          </li>

          <li>
            <a href="portfolio.php"
              class="<?=($current_page == 'portfolio.php') ? 'active' : ''?>">
              Portfolio
            </a>
          </li>

          <li>
            <a href="certifications.php"
              class="<?=($current_page == 'certifications.php') ? 'active' : ''?>">
              Certifications
            </a>
          </li>

          <li>
            <a href="contact.php"
              class="<?=($current_page == 'contact.php') ? 'active' : ''?>">
              Contact
            </a>
          </li>

        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

      </nav>
    </div>
  </header>