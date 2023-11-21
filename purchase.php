<?php

include_once 'config.php';


session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['purchase']))
    {
        $query1 = "INSERT INTO `order_manager`(`full_name`, `phone_number`, `address`, `pay_mod`) VALUES ('$_POST[full_name]', '$_POST[phone_number]', '$_POST[address]', '$_POST[pay_mod]');" ;
        if(mysqli_query($conn, $query1))
        {
            $order_id = mysqli_insert_id($conn);
            $query2 = "INSERT INTO `user_order`(`order_id`, `petname`, `petprice`, `quantity`, `image_name`) VALUES (?,?,?,?,?)";
            $stmt = mysqli_prepare($conn, $query2);
            if($stmt)
            {
                mysqli_stmt_bind_param($stmt,"isiis",$order_id,$petname,$petprice,$quantity,$image_name);
                foreach($_SESSION['cart'] as $key => $value)
                {
                    $petname = $value['petname'];
                    $petprice = $value['petprice'];
                    $quantity = $value['quantity'];
                    $image_name = $value['image_name'];
                    mysqli_stmt_execute($stmt);
                }
                unset($_SESSION['cart']);
                echo"<script> alert('order placed')
                window.location.href = 'order-details.php'
                </script>";
            }
            else
            {
                echo"<script> alert('error')
                window.location.href = 'add_cart.php'
                </script>";
            }
        }
        else
        {
            echo"<script> alert('error')
            window.location.href = 'add_cart.php'
            </script>";
        }
    }
}

if(isset($_POST['purchase'])){

    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
 
    $select = mysqli_query($conn, "SELECT * FROM `order_manager` WHERE full_name = '$full_name'") or die('query failed');
 
    if(mysqli_num_rows($select) > 0){
       $row = mysqli_fetch_assoc($select);
       $_SESSION['order_id'] = $row['order_id'];
    }else{
        echo "error";
    }
 
 }


?>