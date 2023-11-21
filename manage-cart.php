<?php

include_once 'config.php';
$req = "SELECT * FROM add_pets";
$all_pets = $conn->query($req);

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['add_to_cart']))
    {
        if(isset($_SESSION['cart']))
        {
            $myitems = array_column($_SESSION['cart'], 'petname');
            if(in_array($_POST['petname'],$myitems))
            {
                echo"<script> alert('item already added')
                window.location.href = 'inner-page.php'
                </script>";
            }
            else
            {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('id' => $_POST['id'], 'image_name' => $_POST['image_name'], 'petname' => $_POST['petname'], 'petprice' => $_POST['petprice'], 'quantity' => 1);
                echo"<script> alert('item added')
                window.location.href = 'inner-page.php'
                </script>";
            }
        }
        else
        {
            $_SESSION['cart'][0]=array('id' => $_POST['id'], 'image_name' => $_POST['image_name'], 'petname' => $_POST['petname'], 'petprice' => $_POST['petprice'], 'quantity' => 1);
            echo"<script> alert('item added')
            window.location.href = 'inner-page.php'
            </script>";
        }
    }
    if(isset($_POST['remove_pet']))
    {
        foreach($_SESSION['cart'] as $key => $value)
        {
            if($value['petname']== $_POST['petname'])
            {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                echo"
                <script>
                alert('item remove');
                window.location.href = 'add_cart.php';
                </script>
                ";
            }
        }
    }
}

?>