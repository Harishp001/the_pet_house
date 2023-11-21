<?php
session_start();

include 'config.php';

if(isset($_POST['submit'])){

   $f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
   $l_name = mysqli_real_escape_string($conn, $_POST['l_name']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      mysqli_query($conn, "INSERT INTO `user_info`(f_name, l_name, name, email, password) VALUES('$f_name', '$l_name', '$name', '$email', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:userlogin.php');
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
   <style>
      /* Decorative CSS styles */

      body {
         font-family: 'Roboto', sans-serif;
         background-color: #f5f5f5;
         background: url("assets/img/dogs.jpg") right;
         background-size: 1800px;
         font-family: 'Roboto', sans-serif;
         background-color: #f5f5f5;
         background: url("assets/img/dogs.jpg") no-repeat center;
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
      <input type="text" name="f_name" required placeholder="enter First name" class="box">
      <input type="text" name="l_name" required placeholder="enter Last name" class="box">
      <input type="text" name="name" required placeholder="enter username" class="box">
      <input type="email" name="email" required placeholder="enter email" class="box">
      <input type="password" name="password" required placeholder="enter password" class="box">
      <input type="password" name="cpassword" required placeholder="confirm password" class="box">
      <input type="submit" name="submit" class="btn" value="register now"><br><br>
      <p>already have an account? <a href="userlogin.php">login now</a></p>
   </form>

</div>

</body>
</html>