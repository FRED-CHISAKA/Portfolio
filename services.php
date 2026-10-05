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

  <!-- FOOTER -->
  <?php include 'include/footer.php'; ?>