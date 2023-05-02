<?php
session_start();
include('../font.php');
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
  <title>Your cart</title>
</head>
<body>
<br>
  <div class="container" id="c1">
    <center>
      <div>
        <h1>Welcome  <?php echo $_SESSION['name']; ?> </h1><br><br>
        <h1 style="border: 2px dotted black;width:fit-content;border-radius:15px;padding: 0px 10px;">Your Cart</h1>
        <a href="../index.php" style="text-decoration:none;font-size:20px;color:black;">Go to shop</a>
      </div>
    </center>
  </div>
  <div class="container">
    <table>
      <tr>
        <th>user</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Deleting</th>
      </tr>
  <?php
  include ('../confige.php');
  $id=@$_GET['id'];
  $email=$_SESSION['email'];
  if($email=='admin@gmail.com'){
    $ro1=mysqli_query($con , "SELECT * FROM cart");
    while($nm1=mysqli_fetch_array($ro1)){
    echo 
        "<tr>";
        echo  "<td>".$nm1['name']."</td>";
        echo  "<td>".$nm1['title']."</td>";
        echo  "<td>".$nm1['price']."</td>";
        echo  "<td>"."<img src=../".$nm1['image']." alt='image' style='width:50px;'>"."</td>";
        echo  "<td>"."<a href='delete_product.php? id=$nm1[id]' style='text-decoration: none;'>"."delete"."</a>"."</td>";
    };
  }else{
    $user_name=$_SESSION['name'];
    $ro2=mysqli_query($con , "SELECT * FROM cart WHERE name ='$user_name'");
    while($nm2=mysqli_fetch_array($ro2)){
    echo 
        "<tr>";
        echo  "<td>".$nm2['name']."</td>";
        echo  "<td>".$nm2['title']."</td>";
        echo  "<td>".$nm2['price']."</td>";
        echo  "<td>"."<img src=../".$nm2['image']." alt='image' style='width:50px;'>"."</td>";
        echo  "<td>"."<a href='delete_product.php? id=$nm2[id]' style='text-decoration: none;'>"."delete"."</a>"."</td>";
    };
  }
  
  ?>
      </tr>
    </table>
  </div>
</body>
</html>