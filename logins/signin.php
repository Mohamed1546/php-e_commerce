<?php
include ('../confige.php');
session_start();
if(isset($_SESSION['name'])){
  header('location:../index.php');
}else{
  if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $se = mysqli_query($con , "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $nm =mysqli_fetch_array($se);
    if($email=='' || $password==''){
      echo "<h4 style='background-color: #17a2b8;border-radius:15px;padding:2px 10px;width:fit-content;margin:auto;color:white;'>Insert your email and your password</h4>";
    }elseif($email=='admin@gmail.com' and $password=='admin'){
      @session_start();
      $_SESSION['name']=$nm['name'];
      $_SESSION['id']=$nm['id'];
      $_SESSION['email']=$nm['email'];
      echo "<h4 style='background-color:#28a745;border-radius:15px;padding:2px 10px;width:fit-content;margin:auto;color:white;'>Success Login</h4>";
      header('Refresh:1;../admin_page.php');
    }elseif($email=@$nm['email'] && $password=@$nm['password']){
      @session_start();
      $_SESSION['name']=$nm['name'];
      $_SESSION['id']=$nm['id'];
      $_SESSION['email']=$nm['email'];
      echo "<h4 style='background-color:#28a745;border-radius:15px;padding:2px 10px;width:fit-content;margin:auto;color:white;'>Success Login</h4>";
      header('Refresh:1;../index.php');
    }else{
      echo "<h4 style='background-color:#dc3545;border-radius:15px;padding:2px 10px;width:fit-content;margin:auto;color:white;'>Maybe your email or password is wrong please try again</h4>";
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
  <title>Sign In Page</title>
</head>
<body>
  <center style="margin-top:80px;">
    <form method="post" style="text-align:left;">
    <center style="margin-top:-40px;">
      <i class="fa-solid fa-user" 
      style="scale:3;border: 1px solid black;border-radius:20px;padding:7px;background-color:silver;">
      </i>
    </center>
    <h2 style="border-bottom:2px solid black;width:60%;font-weight:bold;">Sign In</h2>
    <br>
      <h5>User name</h5>
      <input type="email" name="email" placeholder="Enter your email"><br><br>
      <h5>Password</h5>
      <input type="password" name="password" placeholder="Enter your password"><br><br>
      <input type="submit" name="submit" value="submit" style="font-size:20px;">
      <div>
        <span>I don't have email</span>
        <a href="signup.php" style="font-size:13px;">Sign up now</a>
      </div><br><br>
      <a href="../index.php" style="background-color:red;">Main Page</a>
    </form>
  </center>
</body>
</html> 