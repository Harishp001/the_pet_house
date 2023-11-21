<?php

include 'config.php';

if(isset($_POST['submit'])){

   $ngo_reg_no = mysqli_real_escape_string($conn, $_POST['ngo_reg_no']); 
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $contact_name = mysqli_real_escape_string($conn, $_POST['contact_name']); 
   $phone_no = mysqli_real_escape_string($conn, $_POST['phone_no']);
   $address = mysqli_real_escape_string($conn, $_POST['address']); 
   $zip = mysqli_real_escape_string($conn, $_POST['zip']); 
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $about = mysqli_real_escape_string($conn, $_POST['about']);

   $select = mysqli_query($conn, "SELECT * FROM `ngo_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      mysqli_query($conn, "INSERT INTO `ngo_info`(ngo_reg_no, name, contact_name, phone_no, address, zip, email, password, about) VALUES('$ngo_reg_no', '$name', '$contact_name', '$phone_no', '$address', '$zip',  '$email', '$pass', '$about')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:ngologin.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style1.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   <style>
      /* Decorative CSS styles */

      body {
         font-family: 'Roboto', sans-serif;
         background-color: #f5f5f5;
         background: url("assets/img/ngodog2.jpg") right;
         background-size: 1800px;
         font-family: 'Roboto', sans-serif;
         background-color: #f5f5f5;
         background: url("assets/img/ngodog2.jpg") no-repeat center;
         background-size: cover;
      }

      .form-container {
         width: 520px;
         margin: 0 auto;
         padding: 40px;
         background-color: #fff;
         border-radius: 5px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         width: 520px;
         margin: 0 auto;
         padding: 40px;
         background-color: rgba(255, 255, 255, 0.8);
         border-radius: 5px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .form-container h3 {
         text-align: center;
         margin: 0 0 20px;
         color: #333;
         font-size: 24px;
         text-transform: uppercase;
      }

      .form-container .box {
         width: 100%;
         padding: 10px;
         margin-bottom: 20px;
         border: 1px solid #ccc;
         border-radius: 3px;
         font-size: 16px;
         outline: none;
         transition: border-color 0.3s ease;
      }

      .form-container .box:focus {
         border-color: #4caf50;
      }

      .form-container .btn {
         width: 100%;
         padding: 12px;
         background-color: #4caf50;
         border: none;
         color: #fff;
         font-size: 16px;
         text-transform: uppercase;
         cursor: pointer;
         outline: none;
         transition: background-color 0.3s ease;
      }

      .form-container .btn:hover {
         background-color: #45a049;
      }

      .form-container p {
         margin: 0;
         text-align: center;
         color: #666;
      }

      .form-container p a {
         color: #4caf50;
         text-decoration: none;
      }

      .form-container p a:hover {
         text-decoration: underline;
      }

      .message {
         padding: 10px;
         margin-bottom: 10px;
         background-color: #f44336;
         color: #fff;
         font-size: 14px;
         cursor: pointer;
         border-radius: 3px;
      }

      /* Dynamic CSS styles */

      .message:hover {
         display: none;
      }
   </style>

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="ngo_reg_no" required placeholder="NGO Reg. No (if any)" class="box">
      <input type="text" name="name" required placeholder="Enter ngo name" class="box">
      <input type="text" name="contact_name" required placeholder="Contact person name" class="box">
      <input required type="tel" class="box" placeholder="Phone number (Without area code)" name="phone_no" value>
      <div class="form-group">
         <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address: 1234 Main St">
      </div>
      <div class="form-row">
         <div class="form-group col-md-5">
            <input type="text" class="form-control"  name="city" id="inputCity" placeholder="City Name">
         </div>
         <div class="form-group col-md-4">
            <select id="inputState" name="state" class="form-control">
            <option selected>State</option>
            <option>Maharashtra</option>
            </select>
         </div>
         <div class="form-group col-md-3">
            <input type="text" class="form-control" name="zip" id="inputZip" placeholder="Zip">
         </div>
      </div>
      <input type="email" name="email" required placeholder="Enter email" class="box">
      <input type="password" name="password" required placeholder="Create password" class="box">
      <input type="password" name="cpassword" required placeholder="Confirm password" class="box">
      <input type="textarea" name="about" placeholder="Add information about NGO" class="box" ><br><br>
      <input type="submit" name="submit" class="btn" value="register now">
      <p>already have an account? <a href="ngologin.php">login now</a></p>
   </form>
</div>



</body>
</html>