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
              <h1>About</h1>
              <p class="mb-0">Innovative and dedicated software engineer with a strong foundation in software development, system analysis, and cybersecurity.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">About</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
            <img src="assets/img/about.PNG" class="img-fluid-about" alt="">
          </div>
          <div class="col-lg-8 content">
            <h2><?php echo $data['title'] ?></h2>
            <p class="fst-italic py-3">
              <?php echo $data['slogan'] ?>
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php echo date('d M Y', strtotime($data['birthday']))?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><?=$data['website']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span><?=$data['phone']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span><?=$data['city']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?=$data['age']?></span></li>

                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span><?=$data['degree']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><?=$data['email']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Certifications:</strong> <span><?=$data['certification']?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>
                    <?php
                      if($data['freelance'] == 1) {
                        echo "Available";
                      }
                      else{
                        echo "Not Available";
                      }
                    ?>
                  </span></li>
                </ul>
              </div>
            </div>
            <!-- <p class="py-3">
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque.
            </p> -->
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

    <?php  
    $counter = "SELECT * FROM `counter`";
    $counter_result = mysqli_query($conn, $counter);

    ?>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4">

    <?php      

    if($counter_result -> num_rows > 0){
      while($row = $counter_result -> fetch_assoc()){
        ?>
        <div class="col-lg-3 col-md-6 mt-5 d-flex flex-column align-items-center">
            <i class="<?=$row['icon']?>"></i>
            <div class="stats-item">
              <span data-purecounter-start="<?=$row['pre']?>" data-purecounter-end="<?=$row['post']?>" data-purecounter-duration="1" class="purecounter"></span>
              <p><?=$row['title']?></p>
            </div>
          </div>
          <!-- End Stats Item -->
        <?php
      }
    }
    ?>
        </div>
      </div>
    </section>


    <!-- Skills Section -->

    <!-- <section id="skills" class="skills section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Skills</h2>
        <div><span>My</span> <span class="description-title">Skills</span></div>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row skills-content skills-animation">

          <div class="col-lg-6">

            <div class="progress">
              <span class="skill"><span>HTML</span> <i class="val">100%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill"><span>CSS</span> <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill"><span>JavaScript</span> <i class="val">75%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">

            <div class="progress">
              <span class="skill"><span>PHP</span> <i class="val">80%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <div class="progress">
              <span class="skill"><span>WordPress/CMS</span> <i class="val">90%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="progress">
              <span class="skill"><span>Photoshop</span> <i class="val">55%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

          </div>

        </div>

      </div>

    </section> -->

    <!-- /Skills Section -->

    <!-- Interests Section -->
    <section id="interests" class="interests section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>SKILLS</h2>
        <div><span>I have</span> <span class="description-title">expertise in</span></div>
      </div>

      <div class="container">
        <div class="row gy-4">

          <?php  
          
          $skills = "SELECT * FROM `skills`";
          $skills_result = mysqli_query($conn, $skills);

          if($skills_result -> num_rows > 0){
            while($skills_row = $skills_result -> fetch_assoc()){
              ?>
                <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
                  <div class="features-item">
                    <i class="<?=$skills_row['icon']?>" style="color: <?=$skills_row['color']?>"></i>
                    <h3><a href="" class="stretched-link"><?=$skills_row['title']?></a></h3>
                  </div>
                </div>
              <?php
            }
          }
          
          ?>

        </div>
      </div>

    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <div><span>Check my</span> <span class="description-title">Testimonials</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper" data-speed="600" data-delay="5000">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

          <?php  
          
          $quotes = "SELECT * FROM `quotes`";
          $quotes_result = mysqli_query($conn, $quotes);

          if($quotes_result -> num_rows > 0){
            while($quotes_row = $quotes_result -> fetch_assoc()){
              ?>

              <div class="swiper-slide">
                <div class="testimonial-item" "="">
                  <p>
                    <i class=" bi bi-quote quote-icon-left"></i>
                    <span><?=$quotes_row['quote']?></span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                  <img src="<?=$quotes_row['img']?>" class="testimonial-img" alt="">
                  <h3><?=$quotes_row['name']?></h3>
                  <h4><?=$quotes_row['title']?> &amp; <?=$quotes_row['company']?></h4>
                </div>
              </div>
              <!-- End testimonial item -->


              <?php
            }
          }
          
          ?>

          
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <?php include 'include/footer.php'; ?>
 