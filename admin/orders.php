
<?php
    include("config.php");
    include "topheader.php";
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            height: auto;
            width: 1200px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            vertical-align: top;
        }
        strong {
            font-weight: bold;
        }
        .button1 {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .button1:hover {
            background-color: #2980b9;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
  <nav class='mx-lt-5 bg-primary'>
  <div class="container-fluid" style="padding: 0">
    
    <div class="sidebar-list">

            <a class="nav-item nav-orders" href="index.php?page=orders">
              <i class="fa fa-book"></i>
              Orders
            </a>

            
            <a class="nav-item nav-adduser nav-edituser nav-manageuser" href="index.php?page=manageuser" >
              <i class="fa fa-users"></i>
                Users
              </a>
            </div>
               
    </div>

  </div>
</nav>


    
</head>
<body>


<div class="receipt mt-5">
    <h2>Order Details</h2>
    <table class="text-center">
        <thead>
        <tr>
            <th>Order Id</th>
            <th>Customer Name</th>
            <th>Phone No</th>
            <th>Address</th>
            <th>Pay_Mod</th>
            <th>Orders</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
                //$orderId = $_SESSION['order_id'];

                //$order_id = 9;
                $query = "SELECT * FROM order_manager ";
                $user_result = mysqli_query($conn, $query);
                while($user_fetch = mysqli_fetch_assoc($user_result))
                {echo "
                    <tr>
                    <td>$user_fetch[order_id]</td>
                    <td>$user_fetch[full_name]</td>
                    <td>$user_fetch[phone_number]</td>
                    <td>$user_fetch[address]</td>
                    <td>$user_fetch[pay_mod]</td>
                    <td>    
                        <table class='text-center'>
                            <thead>
                                <tr>
                                    <th>Pet Name</th>
                                    <th>Pet image</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                        ";
                            $order_query = "SELECT * FROM `user_order` WHERE `order_id`='$user_fetch[order_id]' ";
                            $order_result = mysqli_query($conn,$order_query);
                            while($order_fetch = mysqli_fetch_assoc($order_result))
                            {
                                echo"
                                <tr>
                                <td>$order_fetch[petname]</td>
                                <td><img src = '$order_fetch[image_name]' height='100' width='120' '></td>
                                <td>$order_fetch[petprice]</td>
                                <td>$order_fetch[quantity]</td>
                                </tr>
                                ";
                            }
                            echo"
                            </tbody>
                        </table>
                    </td>
                    <td><input class='btn btn-outline-success mt-5' type='submit' value='Make as Shipped' name='shipped' onclick='showPopup()'></td>
                </tr>
                ";}
            ?>
            
        <!-- Repeat for other items -->
        </tbody>
    </table>
</div>

<script>
   function showPopup() {
      // Create a popup or modal here
      alert("Your Order Has Shipped!");
   }
</script>



</body>
</html>
     