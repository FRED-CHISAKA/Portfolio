
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

  <div class="isotope-layout"
       data-default-filter="*"
       data-layout="masonry"
       data-sort="original-order">

    <!-- Portfolio Filters -->
    <ul class="portfolio-filters isotope-filters"
        data-aos="fade-up"
        data-aos-delay="100">

      <li data-filter="*" class="filter-active">ALL</li>

      <?php

      // Get all portfolio categories
      $category_sql = "SELECT * FROM `category` ORDER BY `id` ASC";
      $category_result = mysqli_query($conn, $category_sql);

      if ($category_result && mysqli_num_rows($category_result) > 0) {

        while ($category_data = mysqli_fetch_assoc($category_result)) {

          ?>

          <li data-filter=".<?= htmlspecialchars($category_data['class']) ?>">
            <?= htmlspecialchars($category_data['name']) ?>
          </li>

          <?php

        }

      }

      ?>

    </ul>
    <!-- End Portfolio Filters -->


    <!-- Portfolio Items -->
    <div class="row gy-4 isotope-container"
         data-aos="fade-up"
         data-aos-delay="200">

      <?php

      $portfolio = "SELECT * FROM `portfolio` ORDER BY `id` ASC";
      $portfolio_result = mysqli_query($conn, $portfolio);

      if ($portfolio_result && mysqli_num_rows($portfolio_result) > 0) {

        while ($portfolio_data = mysqli_fetch_assoc($portfolio_result)) {

          // Portfolio category ID
          $category = $portfolio_data['category'];

          // Get the corresponding category
          $category_sql = "SELECT * FROM `category` WHERE `id`='$category'";
          $category_result = mysqli_query($conn, $category_sql);

          $category_data = mysqli_fetch_assoc($category_result);

          // Get Isotope class
          $category_class = $category_data['class'] ?? '';

          ?>

          <div class="col-lg-4 col-md-6 portfolio-item isotope-item <?= htmlspecialchars($category_class) ?>">

            <div class="portfolio-content h-100">

              <img
                src="<?= htmlspecialchars($portfolio_data['img']) ?>"
                class="img-fluid"
                alt="<?= htmlspecialchars($portfolio_data['title']) ?>"
              >

              <div class="portfolio-info">

                <h4>
                  <?= htmlspecialchars($portfolio_data['title']) ?>
                </h4>

                <p class="mb-5">
                  <?= htmlspecialchars($portfolio_data['description']) ?>
                </p>

                <p class="mt-2">
                  <?= htmlspecialchars($portfolio_data['technology']) ?>
                </p>

                <a
                  href="<?= htmlspecialchars($portfolio_data['url']) ?>"
                  title="<?= htmlspecialchars($portfolio_data['title']) ?>"
                  data-gallery="portfolio-gallery"
                  class="glightbox preview-link"
                >
                  <i class="bi bi-zoom-in"></i>
                </a>

                <a
                  href="<?= htmlspecialchars($portfolio_data['url']) ?>"
                  title="More Details"
                  class="details-link"
                >
                  <i class="bi bi-link-45deg"></i>
                </a>

              </div>

            </div>

          </div>

          <?php

        }

      } else {

        echo '<p>No Portfolio Found.</p>';

      }

      ?>

    </div>
    <!-- End Portfolio Container -->

  </div>

</div>

    </section>
  </main>

<!-- FOOTER -->
  <?php include 'include/footer.php'; ?>