
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
              <h1>Contact</h1>
              <p class="mb-0">Get In Touch.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Contact</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="icon bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p><?=$data['address']?></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Me</h3>
                <p><?=$data['phone']?></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p><?=$data['email']?></p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Social Profiles</h3>
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
            </div>
          </div>
          <!-- End Info Item -->

        </div>

        <?php  
        
          if(isset($_POST['send_message'])){
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $subject = mysqli_real_escape_string($conn, $_POST['subject']);
            $message = mysqli_real_escape_string($conn, $_POST['message']);

            $contact = "INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUE ('$name', '$email', '$subject', '$message')";
            if(mysqli_query($conn, $contact)){
                echo "Inserted successfully";
            }else{
                echo mysqli_error($conn);
            }
          }
        ?>

        <form action="#" method="post" class="contact-form" data-aos="fade-up" data-aos-delay="600">
          <div class="row gy-4">

            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
            </div>

            <div class="col-md-6 ">
              <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
            </div>

            <div class="col-md-12">
              <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
            </div>

            <div class="col-md-12">
              <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
            </div>

            <div class="col-md-12 text-center">
              <button type="submit" name="send_message">Send Message</button>
            </div>

          </div>
        </form>
        <!-- End Contact Form -->

      </div>

    </section>
  </main>

  <!-- FOOTER -->
  <?php include 'include/footer.php'; ?>