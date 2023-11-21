<?php

include 'config.php';
include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>My Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
  <section id="services" class="services">
      <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg12 text-center border rounded bg-light my-xl-5 mb-5">
          <h1>My Cart</h1>
        </div>
        
        <div class="col-lg-9">
        <table class="table table">
            <thead class="text-center">
              <tr>
                <th scope="col">pet id</th>
                <th scope="col">Pet image</th>
                <th scope="col">Pet Name</th>
                <th scope="col">Pet Price</th>
                <th scope="col">No. of Pets</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <?php
              $total = 0;
              if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key => $value)
                {
                  $total = $total + $value['petprice'];
                  echo"
                  <tr>
                    <td>$value[id]</td>
                    <td><img src = '$value[image_name]' height='100' width='120' '></td>
                    <td>$value[petname]</td>
                    <td>$value[petprice]</td>
                    <td><input type='number' class='text-center' value='$value[quantity]' min='1' max='1'></td>
                    <td>
                      <form action='manage-cart.php' method='POST'>
                        <button name='remove_pet' class='btn btn-outline-danger btn-sm'>REMOVE</button>
                        <input type='hidden' name='petname' value='$value[petname]'>
                      </form>
                    </td>
                    <td></td>
                  </tr>
                ";
                }
              }
              ?>
            </tbody>
          </table>
        </div>

        <div class="col-lg-3">
          <div class="border bg-light rounded p-4">
            <h4>Total:</h4>
            <h5 class="text-right"><?php echo $total; ?></h5>
            <br>

              <?php
              
              if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
              {

              ?>

            <form action="purchase.php" method="POST">
                <div class="form-group">
                  <label>Full Name: </label>
                  <input type="text" class="form-control" name="full_name" required>
                </div>
                <div class="form-group">
                  <label>Phone Number: </label>
                  <input type="number" class="form-control" name="phone_number" required>
                </div>
                <div class="form-group">
                  <label>Address: </label>
                  <input type="text" class="form-control" name="address" required>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pay_mod" value="COD" checked>
                  <label class="form-check-label">
                    Cash On Delivery
                  </label>
                </div>
                <br>
              <button class="btn btn-primary btn-block" name="purchase">Make Purchase</button>
            </form>

            <?php

              }

            ?>

          </div>
        </div>

      </div>
    </div>
  
  </body>
</html>

  <?php
  include 'footer.php';
  ?> 