<?php
include ('../confige.php');
session_start();
if(isset($_SESSION['$user'])){
  header('location:../index.php');
}
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $password1=$_POST['password1'];
  $select = mysqli_query($con , "SELECT * FROM users");
  $s=mysqli_fetch_array($select);
  if($email==$s['email']){
    echo "<h5>Sorry use another email</h5>";
  }else{
    if($password1===$password){
      $insert = mysqli_query($con , "INSERT INTO users (name , email , password) VALUES ('$name','$email','$password')");
      header('location:signin.php');
    }
  }
  
}
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  <title>Sign Up Page</title>
</head>
<body>
  <center style="margin-top:100px;">
    <form method="post" style="text-align:left;">
    <center style="margin-top:-40px;">
      <i class="fa-solid fa-user" 
      style="scale:3;border: 1px solid black;border-radius:20px;padding:7px;background-color:silver;">
      </i>
    </center>
    <h2 style="border-bottom:2px solid black;width:90%;font-weight:bold;">Registration</h2>
    <br>
      <h5>Name</h5>
      <input type="text" name="name" placeholder="Enter your name"><br><br>
      <h5>Your email</h5>
      <input type="email" name="email" placeholder="Enter your email"><br><br>
      <h5>Password</h5>
      <input type="password" name="password" placeholder="Enter your password"><br><br>
      <h5>Same Password</h5>
      <input type="password" name="password1" placeholder="Enter your password"><br><br>
      <input type="submit" name="submit" value="submit" style="font-size:20px;">
      <div>
        <span>I have email</span>
        <a href="signin.php" style="font-size:13px;">Sign In</a>
      </div><br><br>
      <a href="../index.php" style="background-color:red;">Main Page</a>
    </form>
  </center>
</body>
</html> 