<?php
include '../db.php';

extract($_POST); 

$update = mysqli_query($con,"UPDATE orders set status = '$status' where order_id = $id ");
if($update)
echo 1;