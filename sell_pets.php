<?php

require_once 'config.php';

if(isset($_POST["submit"])){
  $petname = $_POST["pet_name"];
  $petbreed = $_POST["pet_breed"];
  $pet_category =  $_POST['pet_category'];
  $petage = $_POST["pet_age"];
  $petcolor = $_POST["pet_color"];
  $petprice = $_POST["pet_price"];
  $petdescription = $_POST["pet_description"];

  //For uploads photos
  $upload_dir = "assets/"; //this is where the uploaded photo stored
  $pet_image = $_FILES["image_name"]["name"];
  $upload_dir.$_FILES["image_name"]["name"];
  $upload_file = basename($_FILES["image_name"]["name"]);
  $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION)); //used to detected the image format
  $check = $_FILES["image_name"]["size"]; // to detect the size of the image
  $upload_ok = 0;

  if(file_exists($upload_file)){
      echo "<script>alert('The file already exist')</script>";
      $upload_ok = 0;
  }else{
      $upload_ok = 1;
      if($check !== false){
        $upload_ok = 1;
        if($imageType == 'jpg' || $imageType == 'png' || $imageType == 'jpeg' || $imageType == 'gif'){
            $upload_ok = 1;
        }else{
            echo '<script>alert("please change the image format")</script>';
        }
      }else{
          echo '<script>alert("The photo size is 0 please change the photo ")</script>';
          $upload_ok = 0;
      }
  }

  if($upload_ok == 0){
     echo '<script>alert("sorry your file is doesn\'t uploaded. Please try again")</script>';
  }else{
      if($petname != "" && $petprice !=""){
          move_uploaded_file($_FILES["image_name"]["tmp_name"],$upload_file);

          $sql = mysqli_query($conn,"INSERT INTO `add_pets`(pet_name,image_name,pet_breed,pet_category,pet_color,pet_age,pet_price,pet_description) VALUES('$petname', '$pet_image', '$petbreed', '$pet_category', '$petcolor', '$petage', '$petprice', '$petdescription')") or die('query failed');

        
      }
  }
  header('location:inner-page.php');
}

?>
<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add pets</title>
    <link rel="stylesheet" href="style.css">
    <style>
        *{
        margin: 0;
        padding: 0;
        text-decoration: none;
        font-family: "Poppins", sans-serif;
        }

        html{
            font-size: 62.5%;
        }

        body{
            background-color: #fff;
        }

        #upload_container{
            margin: 10% auto;
            display: flex;
            flex-direction: column;
            width: 50%;
        }

        #upload_container form{
            display: flex;
            flex-direction: column;
            font-weight: 400;
            font-size: 16px;
        }

        #upload_container form input {
            padding: 8px;
            outline: none;
            border: 1px solid lightblue;
            margin-bottom: 8px;
        }

        #upload_container form button{
            padding: 8px;
            outline: none;
            background-color: lightblue;
            border: none;
            margin-bottom: 8px;
            cursor: pointer;
        }

        #upload_container form input[type="submit"]{
            background-color: lightgray;
            border: none;
        }

        #upload_container form input[type="submit"]:hover{
            background-color: white;
            cursor: pointer;
            border: 1px solid lightblue;

        }
    </style>
</head>
<body>
    <?php
         include_once 'header.php';

    ?>
    <section id="upload_container">
        <form action=" " method="POST" enctype="multipart/form-data" >
            <input type="text" name="pet_name" id="pet_name" placeholder="Pet Name" required>
            <input type="text" name="pet_breed" id="pet_breed" placeholder="Pet Breed" required>
            <select class="border 1px solid lightblue mb-3" name="pet_category">
                <option selected>Select Pet Category</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="bird">Bird</option>
            </select>
            <input type="number" name="pet_age" id="pet_age" placeholder="Pet age" required>
            <input type="text" name="pet_color" id="pet_color" placeholder="Pet Color" required>
            <input type="number" name="pet_price" id="pet_price" placeholder="Pet Price" required>
            <input type="text" name="pet_description" id="pet_description" placeholder="Add Pet Description" >
            <input type="file" onclick="upload();" name="image_name" id="image_name" required >
            <input type="submit" value="Upload" name="submit">
        </form>
    </section>

    <script>
        var pet_name = document.getElementById("pet_name");
        var pet_breed = document.getElementById("pet_breed");
        var pet_category = document.getElementById("pet_category");
        var pet_age = document.getElementById("pet_age");
        var pet_color = document.getElementById("pet_color");
        var pet_price = document.getElementById("pet_price");
        var pet_description = document.getElementById("pet_description");
        var pet_name = document.getElementById("pet_name");

     /*   function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change",function(){
            var file = this.files[0];
            if(productname.value == ""){
                productname.value = file.name;
            }
            choose.innerHTML = "You can change("+file.name+") picture";
        })*/
    </script>
</body>
</html>

<?php
include 'footer.php';
?>