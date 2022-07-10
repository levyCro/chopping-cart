
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Chooping Cart OOP</title>
  <!--Font Awesome -->
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
</head>

<body>
<header id="header">
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a href="index.php" class="navbar-brand">
        <h3 class="px-5">
            <i class="fas fa-shopping-basket"></i> Shopping Cart
        </h3>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="mr-auto"></div>
        <div class="navbar-nav">
            <a href="cart.php" class="nav-item nav-link active">
                <h5 class="px-5 cart">
                    <i class="fas fa-shopping-cart"></i> Cart 
                    <?php  
                    if(isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                        echo "<span id=\"cart_count\" class=\"text-warning bg-light py-1 px-3 rounded-pill\">$count</span>";
                    } else {
                        echo "<span id=\"cart_count\" class=\"text-warning bg-light py-1 px-3 rounded-pill\">0</span>";
                    }
                    ?>
                </h5>
            </a>
        </div>
    </div>

 </nav>
</header>