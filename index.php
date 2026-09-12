
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
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="resume.php">Resume</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="portfolio.php">Portfolio</a></li>
          <li><a href="certifications.php">Certifications</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Certifications</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Certifications</a></li>
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
          </li> -->
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/profile-5.PNG" alt="" data-aos="fade-in">

      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <h2><?=$data['name']?></h2>
        <p>I'm a <span><?=$data['title']?></span> from <?= $data['place']?>.</p>

        <div class="social-links">
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
      </div>  

    </section>
    <!-- /Hero Section -->

    <div class="more-sections">
      <section id="about">
          <p class="section_text_p1">Get To Know More</p>
          <h1 class="title">About Me</h1>
          <div class="section-container">
              <div class="section_pic-container">
                  <img src="assets/img/projects/1.jpg" style="width: 400px; height: 100%;" alt="Profile picture" class="about-pic">
              </div>
              <div class="about-details-container">
                  <div class="about-containers">
                      <div class="details-container">
                          <img src="assets/img/experience.jpg" alt="Experience icon" class="icon">
                          <h3>Experience</h3>
                          <p>2+ years <br/> Software Development</p>
                      </div>
                      <div class="details-container">
                          <img src="assets/img/education.jpg" alt="Education icon" class="icon">
                          <h3>Education</h3>
                          <p>B.Sc. Degree<br/> Software Engineering</p>
                      </div>
                  </div>
                  <div class="text-container">
                      <p>Innovative and dedicated software engineer with a strong foundation in software development, system analysis, and cybersecurity. Eager to apply my skills in creating efficient and scalable IT solutions while contributing to organizational growth. Passionate about leveraging emerging technologies such as Huawei storage solutions to solve real-world problems and drive technological advancement.</p>
                  </div>
              </div>
          </div>
      </section>

      <section id="experience">
          <p class="section_text_p1">Explore My</p>
          <h1 class="title">Experience</h1>
          <div class="experience-details-container">
              <div class="about-containers">
                  <div class="details-container">
                      <h2 class="experience-sub-title">Frontend Development</h2>
                      <div class="article-container">
                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>HTML</h3>
                                  <p>Experienced</p>
                              </div>
                          </article>

                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>CSS</h3>
                                  <p>Experienced</p>
                              </div>
                          </article>

                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>JavaScript</h3>
                                  <p>Experienced</p>
                              </div>
                          </article>

                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>ReactJS</h3>
                                  <p>Intermediate</p>
                              </div>
                          </article>

                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>Python(Django)</h3>
                                  <p>Experienced</p>
                              </div>
                          </article>

                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>Java(STS)</h3>
                                  <p>Experienced</p>
                              </div>
                          </article>
                      </div>
                  </div>
                  <div class="details-container">
                      <h2 class="experience-sub-title">Backend Development</h2>
                      <div class="article-container">
                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>PHP(Laravel)</h3>
                                  <p>Experienced</p>
                              </div>
                          </article>

                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>MySQL</h3>
                                  <p>Experienced</p>
                              </div>
                          </article>

                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>Mongo DB</h3>
                                  <p>Experienced</p>
                              </div>
                          </article>

                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>Node JS</h3>
                                  <p>Intermediate</p>
                              </div>
                          </article>

                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>Express JS</h3>
                                  <p>Experienced</p>
                              </div>
                          </article>

                          <article>
                              <img src="assets/img/checkmark.PNG" alt="Experience icon" class="icon">
                              <div>
                                  <h3>Git</h3>
                                  <p>Intermediate</p>
                              </div>
                          </article>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section id="projects">
          <p class="section_text_p1">Browse My Recent</p>
          <h1 class="title">Projects</h1>
          <div class="experience-details-container">
              <div class="about-containers">
                  <div class="details-container color-container">
                      <div class="article-container">
                          <img src="assets/img/projects/1.jpg" style="height: 270px;" alt="Project 1" class="project-img">
                      </div>
                      <h2 class="experience-sub-title project-title">Project One</h2>
                      <div class="btn-container">
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Github</button>
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Live Demo</button>
                      </div>
                  </div>

                  <div class="details-container color-container">
                      <div class="article-container">
                          <img src="assets/img/projects/1.jpg" style="height: 270px;" alt="Project 2" class="project-img">
                      </div>
                      <h2 class="experience-sub-title project-title">Project Two</h2>
                      <div class="btn-container">
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Github</button>
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Live Demo</button>
                      </div>
                  </div>

                  <div class="details-container color-container">
                      <div class="article-container">
                          <img src="assets/img/projects/1.jpg" style="height: 270px;" alt="Project 3" class="project-img">
                      </div>
                      <h2 class="experience-sub-title project-title">Project Three</h2>
                      <div class="btn-container">
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Github</button>
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Live Demo</button>
                      </div>
                  </div>
              </div>
              <div class="about-containers">
                  <div class="details-container color-container">
                      <div class="article-container">
                          <img src="assets/img/projects/1.jpg" style="height: 270px;" alt="Project 4" class="project-img">
                      </div>
                      <h2 class="experience-sub-title project-title">Project Four</h2>
                      <div class="btn-container">
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Github</button>
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Live Demo</button>
                      </div>
                  </div>

                  <div class="details-container color-container">
                      <div class="article-container">
                          <img src="assets/img/projects/1.jpg" style="height: 270px;" alt="Project 5" class="project-img">
                      </div>
                      <h2 class="experience-sub-title project-title">Project Five</h2>
                      <div class="btn-container">
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Github</button>
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Live Demo</button>
                      </div>
                  </div>

                  <div class="details-container color-container">
                      <div class="article-container">
                          <img src="assets/img/projects/1.jpg" style="height: 270px;" alt="Project 6" class="project-img">
                      </div>
                      <h2 class="experience-sub-title project-title">Project Six</h2>
                      <div class="btn-container">
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Github</button>
                          <button class="btn btn-color-2 project-btn" onclick="location.href='https://github.com/'">Live Demo</button>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section id="contact">
          <p class="section_text_p1">Get In Touch</p>
          <h1 class="title">Contact Me</h1>
          <div class="contact-info-upper-container">
              <div class="contact-info-container">
                  <p><a href="mailto:chisakamusumba@gmail.com"><i class="icon bi bi-envelope flex-shrink-0"></i>Chisakamusumba@gmail.com</a></p>
              </div>
              <div class="contact-info-container">
                  <p><a href="https://www.linkedin.com/"><i class="bi bi-linkedin"></i>Linkedin</a></p>
              </div>
          </div>
      </section>
    </div>

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