
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
              <h1>Portfolio</h1>
              <p class="mb-0">Get a glimpse of some of the best solutions I have provided to many reputable firms across the world over the years.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Portfolio</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">ALL</li>
            <li data-filter=".filter-app">Software Development</li>
            <li data-filter=".filter-product">Cybersecurity</li>
            <li data-filter=".filter-branding">Cloud & DevOps</li>
            <li data-filter=".filter-books">IT Infrastructure</li>
            <li data-filter=".filter-books">AI & Machine Learning</li>
          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <?php  
            
            $portfolio = "SELECT * FROM `portfolio`";
            $portfolio_result = mysqli_query($conn, $portfolio);
            
            if($portfolio_result -> num_rows > 0){
              while($portfolio_data = $portfolio_result -> fetch_assoc()){
                $category = $portfolio_data['category'];
                $category_sql = "SELECT * FROM `category` WHERE `category`.`id`='$category'";
                $category_result = mysqli_query($conn, $category_sql);
                $category_data = mysqli_fetch_assoc($category_result);

                ?>

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item <?=$portfolio_data['category']?>">
                  <div class="portfolio-content h-100">
                    <img src="<?=$portfolio_data['img']?>" class="img-fluid" alt="">
                    <div class="portfolio-info">
                      <h4><?=$portfolio_data['title']?></h4>
                      <p class="mb-5"><?=$portfolio_data['description']?></p>
                      <p class="mt-2"><?=$portfolio_data['technology']?></p>
                      <a href="<?=$portfolio_data['url']?>" title="<?=$portfolio_data['title']?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                      <a href="<?=$portfolio_data['url']?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                    </div>
                  </div>
                </div>
                  
                <?php

              }
            }
            else{
              echo "No Portfolio Found.";
            }
            
            ?>

          </div>
        </div>
      </div>
    </section>
  </main>

<!-- FOOTER -->
  <?php include 'include/footer.php'; ?>