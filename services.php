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
              <h1>Services</h1>
              <p class="mb-0">Creating efficient and scalable IT solutions while contributing to organizational growth.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Services</li>
          </ol>
        </div>
      </nav>
    </div>
    <!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <div class="container">

        <?php  
        
          $services = "SELECT * FROM `services`";
          $services_result = mysqli_query($conn, $services);
        
        ?>

        <div class="row gy-4">
          <?php

            if($services_result -> num_rows > 0){
              while($services_data = $services_result -> fetch_assoc()){
                ?>

                  <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                      <div class="icon">
                        <i class="<?=$services_data['icon']?>"></i>
                      </div>
                      <a href="<?=$services_data['url']?>" class="stretched-link">
                        <h3><?=$services_data['title']?></h3>
                      </a>
                      <p><?=$services_data['description']?></p>
                    </div>
                  </div>

                <?php
              }
            }
            else {
              echo "No Service Found.";
            }

          ?>
        </div>

      </div>

    </section>
    <!-- /Services Section -->

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