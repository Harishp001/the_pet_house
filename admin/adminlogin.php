<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `admin_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:orders.php');
   }else{
      $message[] = 'incorrect password or email!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      /* Decorative CSS styles */

      body {
         font-family: 'Roboto', sans-serif;
         background-color: #f5f5f5;
         background: url("assets/img/bird3.jpg") right;
         background-size: 1800px;
         font-family: 'Roboto', sans-serif;
         background-color: #f5f5f5;
         background: url("assets/img/bird3.jpg") no-repeat center;
         background-size: cover;
      }

      .form-container {
         width: 320px;
         margin: 0 auto;
         padding: 40px;
         background-color: #fff;
         border-radius: 5px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         width: 320px;
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

      /* Additional CSS for animations */

      .message {
         opacity: 1;
         transition: opacity 0.3s ease;
      }

      .message.hidden {
         opacity: 0;
      }

   </style>

</head>
<body>

<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <input type="email" name="email" required placeholder="enter email" class="box">
      <input type="password" name="password" required placeholder="enter password" class="box">
      <input type="submit" name="submit" class="btn" value="login now"><br><br>
   </form>

   <?php
   if(isset($message)){
      foreach($message as $message){
         echo '<div class="message">'.$message.'</div>';
      }
   }
   ?>

</div>

<script>
   // JavaScript for hiding messages after clicking on them
   const messages = document.querySelectorAll('.message');

   messages.forEach(message => {
      message.addEventListener('click', () => {
         message.classList.add('hidden');
      });
   });
</script>

</body>
</html>
