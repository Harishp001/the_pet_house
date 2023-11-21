<?php
include 'config.php';
$req = "SELECT * FROM add_pets";
$all_pets = $conn->query($req);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

<?php
include_once 'header.php';
?>

     <!-- ======= Services Section ======= -->

     <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Categories</h2>
          <p>Check pets Categories</p>
        </div>
        <?php
          while($row = mysqli_fetch_assoc($all_pets)){
        ?>
        <div class="raw">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <img src="<?php echo $row["image_name"]; ?>" class="img-fluid" alt=""><br><br>
              <p class="pet_name"><h5><b>Name : <?php echo $row['pet_name'];?></b></h5></p>
              <p class="pet_breed"><h5><b>Breed : <?php echo $row['pet_breed'];  ?></b></h5></p>
              <p class="pet_color"><h5><b>Color : <?php echo $row['pet_color'];  ?></b></h5></p>
              <p class="pet_age"><h5><b>Age : <?php echo $row['pet_age'];  ?></b></h5></p>
              <p class="pet_price"><h5><b>Price : <?php echo $row['pet_price'];  ?></b></h5></p><br><br>
              <button class="add">Add to cart</button>
          </div>
        </div>
        </div>
        <?php
          }
        ?>
      </div>
    </section><!-- End Services Section -->
 
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>The Pet<br>
                House<span>.</span></h3>
              <p>
                shop.21,Nigdi  <br>
                Akurdi, Pune<br><br>
                <strong>Phone:</strong> +91 9545348879<br>
                <strong>Email:</strong> info@thepethouse.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="inner-page.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="sell_pets.php">Sell Pets</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Categories</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Beautiful lines</h4>
            <p>“The whole glorious history of animals with people is about joy and connection. It’s about loving this creature and letting this creature love you.”</p>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>The Pet House</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

        Designed by Harish Patil & Harshal Asampelli.</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>