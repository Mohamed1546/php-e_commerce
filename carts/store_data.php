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
    <style>
      center{
        display: none;
      }
    </style>
    <title>store</title>
    <style>

    </style>
</head>
<body>
  <?php
  include ('../confige.php');
  $id= $_GET['id'];
  $row = mysqli_query($con,"SELECT * FROM information WHERE id=$id");
  $nm = mysqli_fetch_array($row);
  if($_SESSION['name']){
    if(isset($id)){
      echo "
        <center class='col'>
          <div class='card' method='post'>
            <h3 name='title'>$nm[title]</h3><br>
            <div style='text-align:left;'>
              <span>price: </span><span name='price'>$nm[price]</span><span> $</span>
            </div>
          </div>
        </center>
      ";
      $in1 = mysqli_query($con,"INSERT INTO cart (name , title , image , price) VALUES ('$_SESSION[name]','$nm[title]','$nm[image]','$nm[price]')");
    }
  }else{
    header('location:../logins/signin.php');
  }
  ?>
  <a href="../index.php" style="padding:10px;background-color:white;font-weight:bold;">Go to shop</a>
  <a href="cart.php? id=$n[id]" style="text-decoration:none;"><h1 style="padding:10px;background-color:white;font-weight:bold;">submit addig to card</h1></a>
</body>
</html>