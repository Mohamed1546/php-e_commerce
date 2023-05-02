<?php
session_start();
echo "<h1 style='background-color:white;padding:10px;width:fit-content;margin:auto;'>"."Welcome " .$_SESSION['name']."</h1>";
include ('confige.php');
$id=@$_GET['id'];
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
    <title>Admin zoon</title>
</head>
<body>
<br>
  <div class="container" id="c1">
    <center>
      <div>
        <h1>Welcome to car shop</h1><br>
        <h3>Choose your luxury car that you liked from our collection.....</h3>
      </div>
    </center>
    <a href="carts/adding.php"><h4 style="border:2px dotted black;width:30%;color:white;">add product</h4></a>
    <div class="row">
      <div class="col-8"></div>
      <div class="col-4">
        <a href="logout.php"
        name="logout"
        style="color:black;width:fit-content;background-color:silver;text-decoration:none;padding:5px;border-radius:10px">
        Log out</a>
        <a href="index.php"
        name="logout" 
        style="color:black;width:fit-content;background-color:silver;text-decoration:none;padding:5px;border-radius:10px">
        Online Shop</a>
      </div><br><br>
    </div>  
  </div><br>
  <div class="row" style="width:80%;margin:auto;border:2px solid black;">
    <?php
      include ('confige.php');
      $row = mysqli_query($con , "SELECT * FROM information");
      while($nm = mysqli_fetch_array($row)){
        echo "
          <center class='col'><br>
            <div class='card' method='post'>
              <img src='$nm[image]' alt='image' class='card_image w-100'>
              <h3>$nm[title]</h3><br>
              <h5>$nm[address]</h5><br>
              <div style='text-align:left;'>
                <span>price: <span name='price'>$nm[price]</span> $</span>
              </div><br>
              <div class='controlling'>
                <a href='admin_page.php? id=$nm[id]'>Delete</a>
                <a href='carts/edite.php? id=$nm[id]'>Editing</a>
              </div>
            </div>
          </center>
        ";  
      }
    ?>
    <?php
  if(isset($_POST['delete'])){
    echo "<h1 style='background-color:dangar;'>Deleting is done</h1>";
  }
  ?><br><br>
  </div><br><br><br>
  <?php
  include('footer.php');
  ?>
</body>
</html>