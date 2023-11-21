<?php

include 'config.php';
$req = "SELECT * FROM add_pets WHERE pet_breed<>'street dog'";

$all_pets = $conn->query($req);
?>

<style>
 .container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .col-lg-4 {
    flex-basis: 32%; /* Adjust this value to control the width of each column */
  }
/* Styling for the icon box container */
.icon-box {
  background-color: #f8f8f8;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  text-align: center;
  transition: transform 0.2s;
  flex: 1 0 30%; /* This sets each icon-box to take up 30% of the container width */
  margin-bottom: 20px;
}

@media screen and (max-width: 768px) {
  .icon-box {
    flex-basis: 48%; /* Change the width of each icon-box for smaller screens */
  }
}
/* Styling for the icon/image */
.icon-box img {
  max-width: 300px;
  height: auto;
  margin-bottom: 15px;
}

/* Styling for the pet name */
.pet_name h5 {
  color: #333;
  font-size: 18px;
  margin-bottom: 10px;
}

/* Styling for the pet breed, color, age, and price */
.pet_breed h5,
.pet_color h5,
.pet_age h5,
.pet_price h5 {
  color: #666;
  font-size: 16px;
  margin-bottom: 5px;
}

/* Styling for the "Add to cart" button */
.add {
  background-color: #007bff;
  color: #fff;
  padding: 8px 16px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.2s;
}

.add:hover {
  background-color: #0056b3;
}

.equal-img {
  width: 100%; /* Ensure the image takes up the full width of its container */
  height: 200px; /* Set the desired height for the images */
  object-fit: cover; /* Maintain the aspect ratio and cover the container */
}


</style>


<?php
include_once 'header.php';
?>
<div class="section-title">
          <p>Check pets Categories</p>
        </div>


     <!-- ======= Services Section ======= -->

     <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <?php
          while($row = mysqli_fetch_assoc($all_pets)){
        ?>
        <form action="manage-cart.php" method="POST">
        <div class="raw">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" style="width: 16rem;" data-aos-delay="100">
            <div class="icon-box">
              <img src="<?php echo $row["image_name"]; ?>" class="img-fluid equal-img" alt=""><br><br>
              <p class="pet_name" name="pet_name"><h5><b>Name : <?php echo $row['pet_name'];?></b></h5></p>
              <p class="pet_breed" name="pet_breed"><h5><b>Breed : <?php echo $row['pet_breed'];  ?></b></h5></p>
              <p class="pet_color" name="pet_color"><h5><b>Color : <?php echo $row['pet_color'];  ?></b></h5></p>
              <p class="pet_age" name="pet_age"><h5><b>Age : <?php echo $row['pet_age'];  ?> year</b></h5></p>
              <p class="pet_price" name="pet_price"><h5><b>Price : <?php echo $row['pet_price'];  ?> rs.</b></h5></p><br><br>
              <button class="btn btn-outline-danger btn-sm" name="add_to_cart">Add to cart</button>
              <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
              <input type="hidden" name="image_name" value="<?php echo $row['image_name'] ?>">
              <input type="hidden" name="petname" value="<?php echo $row['pet_name'] ?>">
              <input type="hidden" name="petprice" value="<?php echo $row['pet_price'] ?>">
          </div>
        </div>
        </div>
        </form>
        <?php
          }
        ?>
      </div>
    </section><!-- End Services Section -->
    
    <?php
        include 'footer.php';
    ?>
        