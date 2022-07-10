<?php
require_once("php/header.php");

session_start();

require_once("php/dbh.php");
require_once("php/component.php");

$db = new Dbh("Productdb", "Producttb");

if(isset($_POST['remove'])){
    if($_GET['action'] == 'remove'){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['product_id'] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}
?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="pt-3">
                <h6>My Cart</h6>
                <hr>
                <?php
                $total = 0;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $product_id = array_column($_SESSION['cart'], 'product_id');

                    $result = $db->getData();
                    while ($row = mysqli_fetch_assoc($result)) {
                        foreach ($product_id as $id) {
                            if ($row['id'] == $id) {
                                cartElement($row['product_image'], $row['product_name'], $row['product_price'], $row['id']);
                                $total = $total + (int)$row['product_price'];
                            }
                        }
                    }
                } else {
                    echo "<h5>Cart is Empty</h5>";
                }
                ?>
            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row py-2">
                    <div class="col-md-6">
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $count = count($_SESSION['cart']);
                            echo "<h6>Price($count items)</h6>";
                        } else {
                            echo "<h6>Price(0 items)</h6>";
                        }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total  ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php echo $total ?></h6>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
include "php/footer.php";
?>