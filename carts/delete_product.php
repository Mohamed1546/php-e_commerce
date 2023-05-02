<?php
  include ('../confige.php');
  @$id=$_GET['id'];
  if(isset($id)){
    $nm = mysqli_query($con , "DELETE FROM cart WHERE id=$id");
    header('location:cart.php');
  }
  ?>