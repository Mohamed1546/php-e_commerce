<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="./jquery-3.6.3.min.js"></script>
    <script src="./popper.min.js"></script>
    <script src="./bootstrap.js"></script>
    <link rel="stylesheet" href="../bb.css"/>
  <title>Adding products</title>
</head>
<body>
  <center>
    <form method="post" action="adding.php" enctype="multipart/form-data">
      <div class="row">
        <div class="col-12">
          <input type="file" name="image" placeholder="image">
        </div>
        <div class="col-12">
          <input type="text" name="title" placeholder="title">
        </div>
        <div class="col-12">
          <input type="text" name="address" placeholder="address">
        </div>
        <div class="col-12">
          <input type="number" name="price" placeholder="price" style="margin-left:10px;"><span > $</span>
        </div>
        <div class="col-12">
          <button name="upload">upload</button>
        </div>
        <div class="col-12">
          <a href="../admin_page.php"> go to main page </a>
        </div>
      </div>
    </form>
  </center>
  <?php
  include ('../confige.php');
  $image= @$_FILES['image'];
  $image_location= @$_FILES['image']['tmp_name'];
  $image_name= @$_FILES['image']['name'];
  $image_up="images/".$image_name;
  $title = @$_POST['title'];
  $address =@$_POST['address'];
  $price =@$_POST['price'];
  if(isset($_POST['upload'])){
    if(empty($image_up) || empty($title) || empty($address)|| empty($price)){
      echo "<h1 style='background-color:red;width:50%;border-radius:20px;margin:auto;'>Failed uploading</h1>";
    }else{
      $insert="INSERT INTO information (image , title , address , price) VALUES ('$image_up','$title','$address','$price')";
      mysqli_query($con,$insert);
      echo "<h1 style='background-color:green;width:50%;border-radius:20px;margin:auto;'>Success uploading</h1>";
    }
  }
  ?>
</body>
</html>