<?php

include 'include/config.php';

/*
|--------------------------------------------------------------------------
| USER / PROFILE
|--------------------------------------------------------------------------
*/
$sql = "SELECT * FROM users WHERE id = 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);


/*
|--------------------------------------------------------------------------
| EDUCATION
|--------------------------------------------------------------------------
*/
$education = mysqli_query($conn,
    "SELECT * FROM education
     
     
     ORDER BY end_year DESC"
);
// AND status = 1
// WHERE user_id = 1


/*
|--------------------------------------------------------------------------
| EXPERIENCE
|--------------------------------------------------------------------------
*/
$experience = mysqli_query($conn,
    "SELECT * FROM experience
     
     
     ORDER BY start_year DESC"
);
// AND status = 1
// WHERE user_id = 1


/*
|--------------------------------------------------------------------------
| SKILLS
|--------------------------------------------------------------------------
*/
$skills = mysqli_query($conn,
    "SELECT * FROM skills
     
     ORDER BY id DESC"
);
// WHERE id = 1


/*
|--------------------------------------------------------------------------
| CERTIFICATIONS
|--------------------------------------------------------------------------
*/
$certifications = mysqli_query($conn,
    "SELECT * FROM certifications
     
     ORDER BY issue_date DESC"
);
// WHERE id = 1


/*
|--------------------------------------------------------------------------
| LANGUAGES
|--------------------------------------------------------------------------
*/
$languages = mysqli_query($conn,
    "SELECT * FROM languages
     
     ORDER BY id DESC"
);
// WHERE id = 1

/*
|--------------------------------------------------------------------------
| INTERESTS
|--------------------------------------------------------------------------
*/
$interests = mysqli_query($conn,
    "SELECT * FROM interests
     
     ORDER BY id DESC"
);
// WHERE id = 1


/*
|--------------------------------------------------------------------------
| AWARDS / ACHIEVEMENTS
|--------------------------------------------------------------------------
*/
$awards = mysqli_query($conn,
    "SELECT * FROM awards
     
     ORDER BY id DESC"
);
// WHERE id = 1


/*
|--------------------------------------------------------------------------
| REFEREES
|--------------------------------------------------------------------------
*/
$referees = mysqli_query($conn,
    "SELECT * FROM referees
     
     ORDER BY id DESC"
);

// WHERE id = 1

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= htmlspecialchars($data['name']) ?> - <?= htmlspecialchars($data['title']) ?></title>

  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

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


<!-- =========================================================
     HEADER
========================================================= -->

<header id="header" class="header d-flex align-items-center fixed-top">

  <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

    <a href="index.php" class="logo d-flex align-items-center">

      <img src="assets/img/logo.png" alt="">

      <h1 class="sitename">
        <?= htmlspecialchars($data['name']) ?>
      </h1>

    </a>


    <nav id="navmenu" class="navmenu">

      <ul>

        <li>
          <a href="index.php">Home</a>
        </li>

        <li>
          <a href="about.php">About</a>
        </li>

        <li>
          <a href="resume.php" class="active">Resume</a>
        </li>

        <li>
          <a href="services.php">Services</a>
        </li>

        <li>
          <a href="portfolio.php">Portfolio</a>
        </li>

        <li>
          <a href="certifications.php">Certifications</a>
        </li>

        <li>
          <a href="contact.php">Contact</a>
        </li>

      </ul>

      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

    </nav>

  </div>

</header>


<main class="main">


<!-- =========================================================
     PAGE TITLE
========================================================= -->

<div class="page-title" data-aos="fade">

  <div class="heading">

    <div class="container">

      <div class="row d-flex justify-content-center text-center">

        <div class="col-lg-8">

          <h1>Resume</h1>

          <p class="mb-0">
            Check My Resume
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
          Resume
        </li>

      </ol>

    </div>

  </nav>

</div>


<!-- =========================================================
     RESUME SECTION
========================================================= -->

<section id="resume" class="resume section">

<div class="container">


<div class="row">


<!-- =====================================================
     LEFT COLUMN
===================================================== -->

<div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">


<!-- =====================================================
     SUMMARY
===================================================== -->

<h3 class="resume-title">
  Summary
</h3>


<div class="resume-item pb-0">

  <h4>
    <?= htmlspecialchars($data['name']) ?>
  </h4>

  <p>
    <em>
      <?= htmlspecialchars($data['slogan'] ?? '') ?>
    </em>
  </p>


  <ul>

    <li>
      <?= htmlspecialchars($data['city'] ?? '') ?>
    </li>

    <li>
      <?= htmlspecialchars($data['phone'] ?? '') ?>
    </li>

    <li>
      <?= htmlspecialchars($data['email'] ?? '') ?>
    </li>

  </ul>

</div>



<!-- =====================================================
     EDUCATION
===================================================== -->

<h3 class="resume-title">
  Education
</h3>


<?php if ($education && mysqli_num_rows($education) > 0) { ?>

  <?php while ($edu = mysqli_fetch_assoc($education)) { ?>

    <div class="resume-item">

      <h4>
        <?= htmlspecialchars($edu['degree']) ?>
      </h4>

      <h5>
        <?= htmlspecialchars($edu['start_year']) ?>
        -
        <?= htmlspecialchars($edu['end_year']) ?>
      </h5>

      <p>
        <em>
          <?= htmlspecialchars($edu['institution']) ?>,
          <?= htmlspecialchars($edu['location']) ?>
        </em>
      </p>

      <?php if (!empty($edu['description'])) { ?>

        <p>
          <?= nl2br(htmlspecialchars($edu['description'])) ?>
        </p>

      <?php } ?>

    </div>

  <?php } ?>

<?php } ?>



<!-- =====================================================
     SKILLS
===================================================== -->

<h3 class="resume-title">
  Skills
</h3>


<?php if ($skills && mysqli_num_rows($skills) > 0) { ?>

  <?php while ($skill = mysqli_fetch_assoc($skills)) { ?>

    <div class="resume-item">

      <h4>
        <?= htmlspecialchars($skill['title']) ?>
      </h4>

      <?php if (!empty($skill['category'])) { ?>

        <p>
          <em>
            <?= htmlspecialchars($skill['category']) ?>
          </em>
        </p>

      <?php } ?>

    </div>

  <?php } ?>

<?php } ?>



<!-- =====================================================
     CERTIFICATIONS
===================================================== -->

<h3 class="resume-title">
  Certifications
</h3>


<?php if ($certifications && mysqli_num_rows($certifications) > 0) { ?>

  <?php while ($cert = mysqli_fetch_assoc($certifications)) { ?>

    <div class="resume-item">

      <h4>
        <?= htmlspecialchars($cert['title']) ?>
      </h4>

      <h5>
        <?= htmlspecialchars($cert['issue_date']) ?>
      </h5>

      <p>
        <em>
          <?= htmlspecialchars($cert['issuer']) ?>
        </em>
      </p>

    </div>

  <?php } ?>

<?php } ?>



<!-- =====================================================
     LANGUAGES
===================================================== -->

<h3 class="resume-title">
  Languages
</h3>


<?php if ($languages && mysqli_num_rows($languages) > 0) { ?>

  <?php while ($language = mysqli_fetch_assoc($languages)) { ?>

    <div class="resume-item">

      <h4>
        <?= htmlspecialchars($language['name']) ?>
      </h4>

      <p>
        <em>
          <?= htmlspecialchars($language['proficiency']) ?>
        </em>
      </p>

    </div>

  <?php } ?>

<?php } ?>


</div>


<!-- =====================================================
     RIGHT COLUMN
===================================================== -->

<div class="col-lg-6">


<!-- =====================================================
     PROFESSIONAL EXPERIENCE
===================================================== -->

<h3 class="resume-title">
  Professional Experience
</h3>


<?php if ($experience && mysqli_num_rows($experience) > 0) { ?>

  <?php while ($exp = mysqli_fetch_assoc($experience)) { ?>

    <div class="resume-item">

      <h4>
        <?= htmlspecialchars($exp['job_title']) ?>
      </h4>

      <h5>

        <?= htmlspecialchars($exp['start_year']) ?>

        -

        <?php

        if ($exp['is_present']) {

            echo "Present";

        } else {

            echo htmlspecialchars($exp['end_year']);

        }

        ?>

      </h5>


      <p>

        <em>

          <?= htmlspecialchars($exp['company']) ?>,

          <?= htmlspecialchars($exp['location']) ?>

        </em>

      </p>


      <?php if (!empty($exp['description'])) { ?>

        <ul>

          <?php

          $points = preg_split('/\r\n|\r|\n/', $exp['description']);

          foreach ($points as $point) {

              $point = trim($point);

              if (!empty($point)) {

                  echo "<li>" . htmlspecialchars($point) . "</li>";

              }

          }

          ?>

        </ul>

      <?php } ?>

    </div>

  <?php } ?>

<?php } ?>



<!-- =====================================================
     INTERESTS
===================================================== -->

<h3 class="resume-title">
  Interests
</h3>


<?php if ($interests && mysqli_num_rows($interests) > 0) { ?>

  <?php while ($interest = mysqli_fetch_assoc($interests)) { ?>

    <div class="resume-item">

      <h4>
        <i class="bi bi-star me-2"></i>
        <?= htmlspecialchars($interest['name']) ?>
      </h4>

    </div>

  <?php } ?>

<?php } ?>



<!-- =====================================================
     AWARDS / ACHIEVEMENTS
===================================================== -->

<h3 class="resume-title">
  Awards & Achievements
</h3>


<?php if ($awards && mysqli_num_rows($awards) > 0) { ?>

  <?php while ($award = mysqli_fetch_assoc($awards)) { ?>

    <div class="resume-item">

      <h4>
        <?= htmlspecialchars($award['title']) ?>
      </h4>

      <h5>
        <?= htmlspecialchars($award['year']) ?>
      </h5>

      <p>

        <em>
          <?= htmlspecialchars($award['organization']) ?>
        </em>

      </p>


      <?php if (!empty($award['description'])) { ?>

        <p>
          <?= nl2br(htmlspecialchars($award['description'])) ?>
        </p>

      <?php } ?>

    </div>

  <?php } ?>

<?php } ?>



<!-- =====================================================
     REFEREES
===================================================== -->

<h3 class="resume-title">
  Referees
</h3>


<?php if ($referees && mysqli_num_rows($referees) > 0) { ?>

  <?php while ($ref = mysqli_fetch_assoc($referees)) { ?>

    <div class="resume-item">

      <h4>
        <?= htmlspecialchars($ref['name']) ?>
      </h4>


      <?php if (!empty($ref['position'])) { ?>

        <p>
          <em>
            <?= htmlspecialchars($ref['position']) ?>
          </em>
        </p>

      <?php } ?>


      <?php if (!empty($ref['organization'])) { ?>

        <p>

          <i class="bi bi-building me-2"></i>

          <?= htmlspecialchars($ref['organization']) ?>

        </p>

      <?php } ?>


      <?php if (!empty($ref['phone'])) { ?>

        <p>

          <i class="bi bi-telephone me-2"></i>

          <?= htmlspecialchars($ref['phone']) ?>

        </p>

      <?php } ?>


      <?php if (!empty($ref['email'])) { ?>

        <p>

          <i class="bi bi-envelope me-2"></i>

          <?= htmlspecialchars($ref['email']) ?>

        </p>

      <?php } ?>

    </div>

  <?php } ?>

<?php } ?>


</div>

</div>

</div>

</section>


</main>



<!-- =========================================================
     FOOTER
========================================================= -->

<footer id="footer" class="footer dark-background">

  <div class="container">

    <h3 class="sitename">
      <?= htmlspecialchars($data['name']) ?>
    </h3>


    <p>
      <?= htmlspecialchars($data['slogan'] ?? '') ?>
    </p>


    <div class="social-links d-flex justify-content-center">

      <a href="">
        <i class="bi bi-twitter-x"></i>
      </a>

      <a href="">
        <i class="bi bi-facebook"></i>
      </a>

      <a href="">
        <i class="bi bi-instagram"></i>
      </a>

      <a href="">
        <i class="bi bi-skype"></i>
      </a>

      <a href="">
        <i class="bi bi-linkedin"></i>
      </a>

    </div>


    <div class="container">

      <div class="copyright">

        <span>Copyright</span>

        <strong class="px-1 sitename">
          <?= htmlspecialchars($data['name']) ?> Portfolio
        </strong>

        <span>All Rights Reserved</span>

      </div>


      <div class="credits">

        <?php

        $details = "SELECT * FROM details WHERE id = 1";

        $details_results = mysqli_query($conn, $details);

        $details_data = mysqli_fetch_assoc($details_results);

        ?>


        Designed by

        <a href="https://techdive.com/">
          <?= htmlspecialchars($data['name']) ?>
        </a>

        |

        <a href="<?= htmlspecialchars($details_data['url'] ?? '') ?>"
           target="_blank">

          <?= htmlspecialchars($details_data['company'] ?? '') ?>

        </a>

      </div>

    </div>

  </div>

</footer>



<!-- Scroll Top -->

<a href="#"
   id="scroll-top"
   class="scroll-top d-flex align-items-center justify-content-center">

  <i class="bi bi-arrow-up-short"></i>

</a>


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
