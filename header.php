  <link href="assets/css/style.css" rel="stylesheet">
  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <?php
  session_start();
  ?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-lg-between">
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="inner-page.php">Home</a></li>
          <li><a class="nav-link scrollto" href="user-ngo.php">NGO</a></li>
          <li><a class="nav-link scrollto" href="sell_pets.php">Sell pets</a></li>
          <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="dog.php">Dogs</a></li>
              <li><a href="cat.php">Cats</a></li>
              <li><a href="bird.php">Birds</a></li>
            </ul>
          </li>
          <div>
            <?php
            $count = 0;
              if(isset($_SESSION['cart']))
              {
                $count = count($_SESSION['cart']);
              }
            ?>
              <a href="add_cart.php" class="nav-link scrollto">My Cart (<?php echo $count;?>)</a>
          </div>
          <li><a class="nav-link scrollto " href="user-profile.php">My Profile</a></li>
        </ul>
        <ul>
          
        </ul>
        
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


<script src="assets/js/main.js"></script>


  