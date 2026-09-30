<!-- FOOTER -->
  
<?php 
    include 'include/config.php';

    $sql = "SELECT * FROM `users` WHERE `users`.`id` = 1";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

?>


<footer id="footer" class="footer dark-background">

    <div class="container">
      <h3 class="sitename"><?= htmlspecialchars($data['name']) ?></h3>
      <p><?= htmlspecialchars($data['slogan'] ?? '') ?></p>

      <div class="social-links d-flex justify-content-center">
        
          <?php 
            if($data['facebook']){
          ?>
              <a href="<?=$data["facebook"]?>" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
          <?php
            }
          ?>

          <?php 
            if($data['x']){
          ?>
              <a href="<?=$data["x"]?>" target="_blank" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <?php
            }
          ?>

          <?php 
            if($data['instagram']){
          ?>
              <a href="<?=$data["instagram"]?>" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
          <?php
            }
          ?>

          <?php 
            if($data['linkedin']){
          ?>
              <a href="<?=$data["linkedin"]?>" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
          <?php
            }
          ?>

          <?php 
            if($data['github']){
          ?>
              <a href="<?=$data["github"]?>" target="_blank" class="github"><i class="bi bi-github"></i></a>
          <?php
            }
          ?>

          <?php 
            if($data['youtube']){
          ?>
              <a href="<?=$data["youtube"]?>" target="_blank" class="youtube"><i class="bi bi-youtube"></i></a>
          <?php
            }
          ?>
      </div>

      <div class="container">
        <div class="copyright">
          <span>Copyright</span>
          <strong class="px-1 sitename"><?= htmlspecialchars($data['name']) ?> Portfolio</strong>
          <span>All Rights Reserved</span>
        </div>

        <div class="credits">
          <?php
            $details = "SELECT * FROM details WHERE id = 1";
            $details_results = mysqli_query($conn, $details);
            $details_data = mysqli_fetch_assoc($details_results);
          ?>

          Designed by
          <a href="https://techdive.com/"><?= htmlspecialchars($data['name']) ?></a>
          |
          <a href="<?= htmlspecialchars($details_data['url'] ?? '') ?>" target="_blank">
            <?= htmlspecialchars($details_data['company'] ?? '') ?>
          </a>
        </div>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
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
