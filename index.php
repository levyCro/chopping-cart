<?php

// start session
session_start();

require_once('php/dbh.php');
require_once('php/component.php');

// create instance of dbh class
$database = new Dbh("Productdb", "Producttb");

if (isset($_POST["add"])) {
  //print_r($_POST["product_id"]);
  if (isset($_SESSION['cart'])) {

    $item_array_id = array_column($_SESSION['cart'],'product_id');
    

    if(in_array($_POST['product_id'], $item_array_id)) {
      echo "<script>alert('Product is already in the cart')</script>";
      echo "<script>window.location ='index.php'</script>";
    }else{
      $count = count($_SESSION['cart']);
      $item_array = array('product_id' => $_POST['product_id']);

      $_SESSION['cart'][$count] = $item_array;
      
    }
   
  } else {

    $item_array = array('product_id' => $_POST['product_id']);

    // new sesion variable
    $_SESSION['cart'][0] = $item_array;
    print_r($_SESSION['cart']);
  }
}

  
  require "php/header.php";
  ?>

  <div class="container">
    <div class="row text-center py-5">
      <?php
      $result = $database->getData();
      while ($row = mysqli_fetch_assoc($result)) {
        component($row['product_name'], $row['product_price'], $row['product_image'], $row['product_discount'], $row['id']);
      }

      ?>
    </div>
  </div>

<?php
 require "php/footer.php";

?>