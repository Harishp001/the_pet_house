<?php
    require('config.php');
    session_start();

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
                <a class="nav-link" href="user-ngo.php">Home</a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="user-ngo-profile.php" method="POST">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">My Profile</button>
            </form>
        </div>
        
    </nav>
    <title> My Account </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

                //$order_id = 9;
                $query = "SELECT * FROM ngo_info  ";
                $user_result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($user_result))
                {echo "
                    <div class='container'>
                        <div class='row'>
                            <div class='col-sm-3'>
                                
                            </div>
                            <div class='col-sm-6'>
                    <div class='login_form mt-5'>
                    <img src='assets/img/profile_pic.jpg' height='100' width='100'  class='logo img-fluid'> <br> 
                
                    <div class='row'>
                        <div class='col'></div>
                    <div class='col-6'> 

                    </div>

                    <table class='table'>
                    <tr>
                        <th>NGO Registration Number: </th>
                        <td>$row[ngo_reg_no]</td>
                    </tr>
                    <tr>
                        <th>NGO Name: </th>
                        <td>$row[name]</td>
                    </tr>
                    <tr>
                        <th>NGO Contact Person: </th>
                        <td>$row[contact_name]</td>
                    </tr>
                    <tr>
                        <th>NGO Contact Number: </th>
                        <td>$row[phone_no]</td>
                    </tr>
                    <tr>
                        <th>Email </th>
                        <td>$row[email]</td>
                    </tr>
                    <tr>
                        <th>NGO Address: </th>
                        <td>$row[address], $row[zip]</td>
                    </tr>
                    <tr>
                        <th>About NGO: </th>
                        <td>$row[about]</td>
                    </tr>
                    </table>
                    <div class='row'>
                        <div class='col-sm-2'>
                        </div>
                    </div>
                    </div>
                    <div class='col-sm-3'>
                    </div>
                    </div>
                </div> 
";}?>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
