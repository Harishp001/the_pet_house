<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location: login.php'); // Redirect if user is not logged in
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch user info from the database
$select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
$row = mysqli_fetch_assoc($select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="inner-page.php">Home</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="user-profile.php" method="POST">
            <button class="btn btn-outline my-2 my-sm-0" type="submit">My Profile</button>
            </form>
        </div>
        
    </nav>
    <title> My Account </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            
        </div>
        <div class="col-sm-6">
  <div class="login_form mt-5">
 <img src="assets/img/profile_pic.jpg" height="100" width="100" alt="Techno Smarter" class="logo img-fluid"> <br> 
 <p> <b>Welcome!</b> <span style="color:#33CC00"><?php echo $row['f_name']; ?></span> </p>
     
          <div class="row">
            <div class="col"></div>
           <div class="col-6"> 
             <?php if(isset($_GET['profile_updated'])) 
      { ?>
    <div class="successmsg">Profile saved ..</div>
      <?php } ?>
        <?php if(isset($_GET['password_updated'])) 
      { ?>
    <div class="successmsg">Password has been changed...</div>
      <?php } ?>

           </div>
            <div class="col"><p><a href="logout.php"><span style="color:red;">Logout</span> </a></p>
         </div>
          </div>

          <table class="table">
          <tr>
              <th>First Name </th>
              <td><?php echo $row['f_name']; ?></td>
          </tr>
          <tr>
              <th>Last Name </th>
              <td><?php echo $row['l_name']; ?></td>
          </tr>
          <tr>
              <th>Username </th>
              <td><?php echo $row['name']; ?></td>
          </tr>
           <tr>
              <th>Email </th>
              <td><?php echo $row['email']; ?></td>
          </tr>
          </table>
           <div class="row">
            <div class="col-sm-2">
            </div>


           </div>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div> 

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</html>





