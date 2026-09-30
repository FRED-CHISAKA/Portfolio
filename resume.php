<?php

  include 'include/config.php';

  /* USER / PROFILE */
  $sql = "SELECT * FROM users WHERE id = 1";
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);

  /* EDUCATION */
  $education = mysqli_query($conn,
      "SELECT * FROM education ORDER BY end_year DESC"
  );
  // AND status = 1
  // WHERE user_id = 1

  /* EXPERIENCE */
  $experience = mysqli_query($conn,
      "SELECT * FROM experience ORDER BY start_year DESC"
  );
  // AND status = 1
  // WHERE user_id = 1

  /* SKILLS */
  $skills = mysqli_query($conn,
      "SELECT * FROM skills ORDER BY id DESC"
  );
  // WHERE id = 1

  /* CERTIFICATIONS */
  $certifications = mysqli_query($conn,
      "SELECT * FROM certifications ORDER BY issue_date DESC"
  );
  // WHERE id = 1

  /* LANGUAGES */
  $languages = mysqli_query($conn,
      "SELECT * FROM languages ORDER BY id DESC"
  );
  // WHERE id = 1

  /* INTERESTS */
  $interests = mysqli_query($conn,
      "SELECT * FROM interests ORDER BY id DESC"
  );
  // WHERE id = 1

  /* AWARDS / ACHIEVEMENTS */
  $awards = mysqli_query($conn,
      "SELECT * FROM awards ORDER BY id DESC"
  );
  // WHERE id = 1

  /* REFEREES */
  $referees = mysqli_query($conn,
      "SELECT * FROM referees ORDER BY id DESC"
  );
  // WHERE id = 1

  include 'include/header.php';

?>

  <main class="main">

    <!-- PAGE TITLE -->
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
            <li><a href="index.php">Home</a></li>
            <li class="current">Resume</li>
          </ol>
        </div>
      </nav>
    </div>

    <!-- RESUME SECTION -->
    <section id="resume" class="resume section">
      <div class="container">
        <div class="row">

          <!-- LEFT COLUMN -->
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

            <!-- SUMMARY -->
            <h3 class="resume-title">Summary</h3>
            <div class="resume-item pb-0">
              <h4>
                <?= htmlspecialchars($data['name']) ?>
              </h4>

              <p>
                <em><?= htmlspecialchars($data['slogan'] ?? '') ?></em>
              </p>

              <ul>
                <li><?= htmlspecialchars($data['city'] ?? '') ?></li>
                <li><?= htmlspecialchars($data['phone'] ?? '') ?></li>
                <li><?= htmlspecialchars($data['email'] ?? '') ?></li>
              </ul>
            </div>

            <!-- EDUCATION -->
            <h3 class="resume-title">Education</h3>

            <?php if ($education && mysqli_num_rows($education) > 0) { ?>
              <?php while ($edu = mysqli_fetch_assoc($education)) { ?>

                <div class="resume-item">
                  <h4><?= htmlspecialchars($edu['degree']) ?></h4>

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
                    <p><?= nl2br(htmlspecialchars($edu['description'])) ?></p>
                  <?php } ?>
                </div>

              <?php } ?>
            <?php } ?>

            <!-- SKILLS -->
            <h3 class="resume-title">Skills</h3>

            <?php if ($skills && mysqli_num_rows($skills) > 0) { ?>
              <?php while ($skill = mysqli_fetch_assoc($skills)) { ?>

                <div class="resume-item">
                  <h4><?= htmlspecialchars($skill['title']) ?></h4>

                  <?php if (!empty($skill['category'])) { ?>
                    <p>
                      <em><?= htmlspecialchars($skill['category']) ?></em>
                    </p>
                  <?php } ?>
                </div>

              <?php } ?>
            <?php } ?>

            <!-- CERTIFICATIONS -->
            <h3 class="resume-title">Certifications</h3>

            <?php if ($certifications && mysqli_num_rows($certifications) > 0) { ?>
              <?php while ($cert = mysqli_fetch_assoc($certifications)) { ?>

                <div class="resume-item">
                  <h4><?= htmlspecialchars($cert['title']) ?></h4>
                  <h5><?= htmlspecialchars($cert['issue_date']) ?></h5>
                  <p>
                    <em><?= htmlspecialchars($cert['issuer']) ?></em>
                  </p>
                </div>

              <?php } ?>
            <?php } ?>

            <!-- LANGUAGES -->
            <h3 class="resume-title">Languages</h3>

            <?php if ($languages && mysqli_num_rows($languages) > 0) { ?>
              <?php while ($language = mysqli_fetch_assoc($languages)) { ?>

                <div class="resume-item">
                  <h4><?= htmlspecialchars($language['name']) ?></h4>
                  <p>
                    <em><?= htmlspecialchars($language['proficiency']) ?></em>
                  </p>
                </div>

              <?php } ?>
            <?php } ?>

          </div>

          <!-- RIGHT COLUMN -->
          <div class="col-lg-6">

            <!-- PROFESSIONAL EXPERIENCE -->
            <h3 class="resume-title">Professional Experience</h3>

            <?php if ($experience && mysqli_num_rows($experience) > 0) { ?>
              <?php while ($exp = mysqli_fetch_assoc($experience)) { ?>

                <div class="resume-item">
                  <h4><?= htmlspecialchars($exp['job_title']) ?></h4>

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

            <!-- INTERESTS -->
            <h3 class="resume-title">Interests</h3>

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

            <!-- AWARDS / ACHIEVEMENTS -->
            <h3 class="resume-title">Awards & Achievements</h3>

            <?php if ($awards && mysqli_num_rows($awards) > 0) { ?>
              <?php while ($award = mysqli_fetch_assoc($awards)) { ?>

                <div class="resume-item">
                  <h4><?= htmlspecialchars($award['title']) ?></h4>
                  <h5><?= htmlspecialchars($award['year']) ?></h5>

                  <p>
                    <em><?= htmlspecialchars($award['organization']) ?></em>
                  </p>

                  <?php if (!empty($award['description'])) { ?>
                    <p><?= nl2br(htmlspecialchars($award['description'])) ?></p>
                  <?php } ?>
                </div>

              <?php } ?>
            <?php } ?>

            <!-- REFEREES -->
            <h3 class="resume-title">Referees</h3>

            <?php if ($referees && mysqli_num_rows($referees) > 0) { ?>
              <?php while ($ref = mysqli_fetch_assoc($referees)) { ?>

                <div class="resume-item">
                  <h4><?= htmlspecialchars($ref['name']) ?></h4>

                  <?php if (!empty($ref['position'])) { ?>
                    <p>
                      <em><?= htmlspecialchars($ref['position']) ?></em>
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

  <!-- FOOTER -->
  <?php include 'include/footer.php'; ?>