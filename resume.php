
<?php 

include 'include/config.php';

// USER
$sql = "SELECT * FROM users WHERE id = 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// EDUCATION
$education = mysqli_query($conn,
    "SELECT * FROM education
     WHERE user_id = 1 AND status = 1
     ORDER BY end_year DESC");

// EXPERIENCE
$experience = mysqli_query($conn,
    "SELECT * FROM experience
     WHERE user_id = 1 AND status = 1
     ORDER BY start_year DESC");

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

</head>

<body class="resume-page">

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
          <li><a href="resume.php" class="active">Resume</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="portfolio.php">Portfolio</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
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
              <h1>Resume</h1>
              <p class="mb-0">Check My Resume</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Resume</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <div class="container">

        <div class="row">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3 class="resume-title">Summary</h3>

            <div class="resume-item pb-0">
          <h4><?=$data['name']?></h4>
          <p><em><?=$data['slogan']?></em></p>

          <ul>
            <li><?=$data['city']?></li>
            <li><?=$data['phone']?></li>
            <li><?=$data['email']?></li>
          </ul>
        </div>

            <h3 class="resume-title">Education</h3>

            <?php while($edu = mysqli_fetch_assoc($education)){ ?>

            <div class="resume-item">
              <h4><?=$edu['degree']?></h4>

              <h5>
                <?=$edu['start_year']?> - <?=$edu['end_year']?>
              </h5>

              <p><em><?=$edu['institution']?>, <?=$edu['location']?></em></p>

              <p><?=$edu['description']?></p>
            </div>

            <?php } ?>

          </div>

          <div class="col-lg-6">

            <h3 class="resume-title">Professional Experience</h3>

            <?php while($exp = mysqli_fetch_assoc($experience)){ ?>

            <div class="resume-item">

              <h4><?=$exp['job_title']?></h4>

              <h5>
                <?=$exp['start_year']?> -
                <?=($exp['is_present']) ? 'Present' : $exp['end_year']?>
              </h5>

              <p><em><?=$exp['company']?>, <?=$exp['location']?></em></p>

              <ul>

                <?php
                $points = explode("\n", $exp['description']);

                foreach($points as $point){
                    echo "<li>".trim($point)."</li>";
                }
                ?>

              </ul>

            </div>

            <?php } ?>

          </div>

        </div>

      </div>

    </section><!-- /Resume Section -->

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
          <span>Copyright</span> <strong class="px-1 sitename"><?=$data['name']?> Portfolio</strong> <span>All Rights Reserved</span>
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