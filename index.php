<?php
include ('confige.php');
session_start();
$id = @$_GET['id'];
if(isset($id)){
  $de = mysqli_query($con, "DELETE FROM information WHERE id=$id");
}
include('font.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.3.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="bootstrap.js"></script>
    <link rel="stylesheet" href="bb.css"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Online shop</title>
</head>
<body>
  <header>
    <div id="bu">
      <a data-toggle="collapse" href="#co" >
        <div class="d11 mb-1" ></div>
        <div class="d12 mb-1" ></div>
        <div class="d13 mb-1" ></div>
      </a>
      <form style="text-align:left;"class="collapse collapse-horizontal" id="co">
        <center>
          <i class="fa-solid fa-user" 
          style="scale:1.5;border: 1px solid black;border-radius:10px;padding:7px;background-color:silver;">
          </i>
        </center>
        <h5 style="border-bottom:2px solid black;width:70%;font-weight:bold;">Your account</h5>
          <h5><span style="color:red;font-weight:bold;">Your name :</span><br><?php echo @$_SESSION['name']; ?></h5>
          <h5><span style="color:red;font-weight:bold;">Your Email :</span><br><?php echo @$_SESSION['email']; ?></h5>
          <div id="a">
            <a href="logins/signin.php" id="s">Signin</a><br><br>
            <a href="logins/signup.php" style="font-size:13px;">Sign up</a>
          </div>
      </form>
    </div>
    <div id="a1">
      <a href="about_us.php">
        <h5 style="border-bottom:1px dashed black;">About us</h5>  
      </a>
      <a href="contact_us.php" >
        <h5 style="border-bottom:1px dashed black ;">contact us</h5>
      </a>
      <h3 class="text-primary ml-1">Online Shop</h3>
    </div>
  </header>
  <div style="background-color:white;width:100%;height:10px;margin:auto;" ><div style="background-color:black;width:100%;height:1px;margin:auto auto;" ></div>
  </div>
  <?php 
  echo "<h1 style='width:fit-content;margin:auto;' >"."Welcome ".@$_SESSION['name']."</h1>";
  ?>
  <div class="container" id="c1">
    <center method="get">
      <div><br>
        <h1>Welcome to car shop</h1>
        <h3>Choose your luxury car that you liked from our collection.....</h3><br><br><br>
      </div>
      <div class="row" id="cart1">
        <div class="col-4" id="cart">
          <a href="carts/cart.php">
            <i style="margin-top:20px;scale:1.5;color:black;"
             class="fa-solid fa-cart-shopping">
            </i>
          <h6 style="color: chocolate;font-weight: bold;text-decoration:none;margin-left:10px;">your CART</h6></a>
        </div>
      </div>
      <?php
      if(isset($_SESSION['name'])){
        echo "<script>"."
          function x1(){
            t= document.getElementById('s').style.display='none';
          }
          x1();
          "."</script>";
      }else{
        echo "<script>"."
          function x(){
            t1= document.getElementById('cart').style.display='none';
          }
          x();
          "."</script>";      
      }
      
      ?>
      <div class="row">
        <div class="col-8"></div>
        <div class="col-4">
          <a href="logout.php"
         name="logout" 
         style="color:black;width:fit-content;background-color:silver;text-decoration:none;padding:5px;border-radius:10px">
         Log out</a>
        </div><br>
      </div>
      <br>
    </center>
  </div><br><br>
  <div class="row" style="width:80%;margin:auto;border:1px solid black;box-shadow: #000 1px 1px 5px;" >
    <?php
      include ('confige.php');
      $row = mysqli_query($con , "SELECT * FROM information");
      while($nm = mysqli_fetch_array($row)){
        echo "
          <center class='col'><br>
            <div class='card' method='post'>
              <img src='$nm[image]' alt='image' class='card_image w-100'>
              <h3 name='title'>$nm[title]</h3><br>
              <h5>$nm[address]</h5><br>
              <div style='text-align:left;'>
                <span>price: <span name='price' >$nm[price]</span> $</span>
              </div><br>
              <div class='controlling'>
                <a href='carts/store_data.php? id=$nm[id]'>Book Now</a>
              </div>
            </div>
          </center>
        ";  
      }
    ?><br><br>
  </div><br><br><br>
  <?php
  include('footer.php')
  ?>
</body>
</html>