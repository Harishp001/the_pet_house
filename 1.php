<?php include 'config.php'; 

?>
<head>
    <style>
* {
  margin: 0;
  padding: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.wrapper {
  padding: 1%;
  width: 80%;
  margin: 0 auto;
}

.text-center {
  text-align: center;
}

.clearfix {
  float: none;
  clear: both;
}

.tbl-full {
  width: 100%;
}
.tbl-30 {
  width: 60%;
  margin-left: 260px;
  margin-top: 50px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th,
td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {
  background-color: #f5f5f5;
}

table tr th {
  border-bottom: 1px solid black;
  padding: 1%;
  text-align: left;
}

table td {
  padding: 1%;
  text-align: left;
  margin: 0 0 20px;
  color: #333;
  font-size: 25px;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  
}

</style>
<link href="assets/css/style.css" rel="stylesheet">
</head>

<div class="main-content">
    <div class="wrapper">

        <br><br>

        <?php 
          include_once 'header.php';
            
            if(isset($_POST['submit']) && isset($_FILES['image']))
            {
        
                $pet_name = mysqli_real_escape_string($conn, $_POST['pet_name']); 
                $pet_breed = mysqli_real_escape_string($conn, $_POST['pet_breed']);
                $pet_color = mysqli_real_escape_string($conn, $_POST['pet_color']);
                $pet_age = mysqli_real_escape_string($conn, $_POST['pet_age']);
                $pet_price = mysqli_real_escape_string($conn, $_POST['pet_price']);
                $image_name = ( $_FILES['image']['name']);
                echo"<pre>";
                print_r( $_FILES['image']);
                echo"</pre>";


                $sql = mysqli_query($conn,"INSERT INTO `add_pets`(pet_name,image_name,pet_breed,pet_color,pet_age,pet_price) VALUES('$pet_name', '$image_name', '$pet_breed', '$pet_color', '$pet_age', '$pet_price)") or die('query failed');

                header('location:inner-page.php');
            }
        
        ?>

        <!-- Add CAtegory Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">
        <h1>Add Pet Info</h1>

            <table class="tbl-30">
                <tr>
                    <td>Pet Name: </td>
                    <td>
                        <input type="text" name="pet_name" placeholder="Pet name" required>
                    </td>
                </tr>

                <tr>
                    <td>Breed: </td>
                    <td>
                        <input type="text" name="pet_breed" placeholder="Pet breed" required>
                    </td>
                </tr>

                <tr>
                    <td>Pet color: </td>
                    <td>
                        <input type="text" name="pet_color" placeholder="Pet color" required>
                    </td>
                </tr>

                <tr>
                
                    <td>Age: </td>
                    <td>
                        <input type="number" name="pet_age" required>
                    </td>
                </tr>

                <tr>
                    <td>Upload Image: </td>
                    <td>
                        <input type="file" name="image" id="image" required><br>
                    </td>
                </tr>
                
                <tr>
                
                <td>Price: </td>
                <td>
                    <input type="number" name="pet_price" required>
                </td>
            </tr><br><br>


                <tr>
                    <td colspan="2">
                        <br>
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>

    </div>
</div><br><br>

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
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Categories</a></li>
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

