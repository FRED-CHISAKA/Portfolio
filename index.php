
<?php 

    include 'include/config.php';

    $sql = "SELECT * FROM `users` WHERE `users`.`id` = 1";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    include 'include/header.php';

?>


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

    <div class="more-sections">
      <section id="about">
          <p class="section_text_p1">Get To Know More</p>
          <h1 class="title">About Me</h1>
          <div class="section-container">
              <div class="section_pic-container">
                  <img src="assets/img/about.PNG" style="width: 400px; height: 100%;" alt="Profile picture" class="about-pic">
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

      <!-- Projects Section -->
        <section id="projects">
            <p class="section_text_p1">Browse My Recent</p>
            <h1 class="title">Projects</h1>

            <div class="experience-details-container">
                <div class="about-containers">

                    <?php
                    // Fetch projects from portfolio table
                    $projects_sql = "SELECT * FROM `portfolio` ORDER BY id DESC LIMIT 3";
                    $projects_result = mysqli_query($conn, $projects_sql);

                    if ($projects_result && mysqli_num_rows($projects_result) > 0) {
                        while ($project = mysqli_fetch_assoc($projects_result)) {

                            ?>

                            <div class="details-container color-container">

                                <div class="article-container">
                                    <img src="<?=$project['img']?>" style="height: 270px;"
                                        alt="<?=htmlspecialchars($project['title'])?>"
                                        class="project-img"
                                    >
                                </div>

                                <h2 class="experience-sub-title project-title">
                                    <?=htmlspecialchars($project['title'])?>
                                </h2>

                                <div class="btn-container">

                                    <!-- Project Link -->
                                    <button class="btn btn-color-2 project-btn"
                                        onclick="window.open('<?=$project['url']?>', '_blank')">
                                        Project Link
                                    </button>

                                    <!-- Live Demo -->
                                    <button class="btn btn-color-2 project-btn"
                                        onclick="window.open('<?=$project['url']?>', '_blank')">
                                        Live Demo
                                    </button>

                                </div>

                            </div>

                            <?php

                        }

                    } else {

                        ?>
                        <div class="details-container color-container">
                            <h2 class="experience-sub-title project-title">
                                No Projects Available
                            </h2>

                            <p>
                                Projects will appear here once they are added through the admin panel.
                            </p>

                        </div>

                        <?php

                    }

                    ?>

                </div>
                <div class="about-containers">

                    <?php
                    // Fetch projects from portfolio table
                    $projects_sql = "SELECT * FROM `portfolio` ORDER BY id ASC LIMIT 3";
                    $projects_result = mysqli_query($conn, $projects_sql);

                    if ($projects_result && mysqli_num_rows($projects_result) > 0) {
                        while ($project = mysqli_fetch_assoc($projects_result)) {

                            ?>

                            <div class="details-container color-container">

                                <div class="article-container">
                                    <img src="<?=$project['img']?>" style="height: 270px;"
                                        alt="<?=htmlspecialchars($project['title'])?>"
                                        class="project-img"
                                    >
                                </div>

                                <h2 class="experience-sub-title project-title">
                                    <?=htmlspecialchars($project['title'])?>
                                </h2>

                                <div class="btn-container">

                                    <!-- Project Link -->
                                    <button class="btn btn-color-2 project-btn"
                                        onclick="window.open('<?=$project['url']?>', '_blank')">
                                        Project Link
                                    </button>

                                    <!-- Live Demo -->
                                    <button class="btn btn-color-2 project-btn"
                                        onclick="window.open('<?=$project['url']?>', '_blank')">
                                        Live Demo
                                    </button>

                                </div>

                            </div>

                            <?php

                        }

                    } else {

                        ?>
                        <div class="details-container color-container">
                            <h2 class="experience-sub-title project-title">
                                No Projects Available
                            </h2>

                            <p>
                                Projects will appear here once they are added through the admin panel.
                            </p>

                        </div>

                        <?php

                    }

                    ?>

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

  <!-- FOOTER -->
  <?php include 'include/footer.php'; ?>
