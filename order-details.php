<?php
    require('config.php');
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
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="inner-page.php">Home</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="add_cart.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">My Cart</button>
        </form>
    </div>
    </nav>

<div class="receipt">
    <h2>Purchase Receipt</h2>
    <p>Date: <?php date_default_timezone_set('Asia/Kolkata'); $time = date('Y-m-d H:i:s'); echo $time; ?></p>
    <table class="text-center">
        <thead>
        <tr>
            <th>Order Id</th>
            <th>Customer Name</th>
            <th>Phone No</th>
            <th>Address</th>
            <th>Pay_Mod</th>
            <th>Orders</th>
        </tr>
        </thead>
        <tbody>
            <?php
                $orderId = $_SESSION['order_id'];

                //$order_id = 9;
                $query = "SELECT * FROM order_manager WHERE order_id = '$orderId' ";
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
                </tr>
                ";}
            ?>
        <!-- Repeat for other items -->
        </tbody>
    </table>
</div>

<div>
<button class="button1" onclick="window.print()">Print Receipt</button>
</div>


</body>
</html>