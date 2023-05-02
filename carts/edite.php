<?php
include ('../confige.php');
session_start();
$id = @$_GET['id'];
if(isset($id)){
  $ro = mysqli_query($con, "SELECT * FROM information WHERE id=$id");
  $data = mysqli_fetch_array($ro);
};
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
  <title>Editing</title>
</head>
<body>
<center>
    <form enctype="multipart/form-data" method="post">
      <h3>Editing products</h3>
      <div class="row">
        <div class="col-12">
          <input type="file" name="image" id="inp" placeholder="image" style="display:none;" value='<?php echo $data['image']?>' >
          <label for="inp" style="cursor: pointer;background:green;color:white;border-radius:15px;padding:5px;">choose new pic</label>
        </div>
        <div class="col-12">
          <input type="text" name="title" placeholder="title" value="<?php echo @$data['title']?>">
        </div>
        <div class="col-12">
          <input type="text" name="address" placeholder="address" value="<?php echo @$data['address']?>">
        </div>
        <div class="col-12">
          <input type="number" name="price" placeholder="price" style="margin-left:10px;" value='<?php echo $data['price']?>'><span > $</span>
        </div>
        <div class="col-12">
          <button name="update" type="submit">update</button>
        </div>
        <div class="col-12">
          <a href="../admin_page.php"> go to main page </a>
        </div>
      </div>
    </form>
  </center>
  <?php
  include ('../confige.php');
  if(isset($_POST['update'])){
    $image= $_FILES['image'];
    $image_location= $_FILES['image']['tmp_name'];
    $image_name= $_FILES['image']['name'];
    $image_up="images/".$image_name;
    $title = $_POST['title'];
    $address =$_POST['address'];
    $price =$_POST['price'];
    $up = mysqli_query($con,"UPDATE information SET image='$image_up' , title='$title' , address='$address', price='$price' WHERE id=$id");
    if($up){
      echo "<h1 style='background-color:dangar;'>updating is done</h1>";
      header('Refresh:1;');
    }else{
      echo "<h1 style='background-color:dangar;'>updating is failed</h1>";
      header('Refresh:2;');
    }
    
  }

  ?>
</body>
</html>