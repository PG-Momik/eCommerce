<?php include_once  'assets/php/partials/_configure.php'?>
<?php
$sql_getPack = 'Select * from tbl_price_plan';

$result = mysqli_query($conn, $sql_getPack);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $i = 0;
    // Looping through the results
    while($row = mysqli_fetch_assoc($result)) {
      $price_plans[$i] = array(
        "pl_id" => $row['pl_id'],
        "pl_name" => $row['pl_name'],
        "pl_discount"=> $row['pl_discount'],
        "pl_delivery" => $row['pl_delivery'],
        "pl_qty" => $row['pl_qty'],
        "pl_feature1" => $row['pl_feature1'],
        "pl_feature2" => $row['pl_feature2'],

      );
      $i++;
    }
} 
mysqli_close($conn);
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BnW|T's</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<section id="main">
        <div class="main container-fluid">
            <!-- ===========================-->
            <nav class="nav navbar-expand-lg navbar-dark bg-dark this-is-nav">
                <a href="index.php" class="navbar-brand nav-brand-selector">B&W|Ts</a>
                <button class="navbar-toggler ml-auto burger-item-selector" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">                
                        <li class="nav-item">
                            <a href="#price" class="nav-link"><i class="fas fa-rupee-sign"></i>Price Plans</a> 
                        </li>

                        <?php if(!(isset($_SESSION['username']))){ ?>
                        <li class="nav-item">
                            <a href="/ecommerce/assets/php/view/register.php" class="nav-link">
                                <i class="fas fa-user-alt"></i>Register
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ecommerce/assets/php/view/login.php" class="nav-link">
                                <i class="fas fa-sign-in-alt"></i>Login
                            </a>
                        </li>
                        <?php }else{?>
                        <li class="nav-item">
                            <a href="/ecommerce/assets/php/view/user.php" class="nav-link">
                                <i class="fas fa-user-alt"></i><?php echo $_SESSION['username']?>
                            </a>
                        </li>
                        <?php }?>
                        <li class="nav-item">
                            <a href="assets/php/view/cart.php" class="nav-link">
                                <i class="fas fa-shopping-cart"></i>Cart 
                                <sup>
                                    <span id="cart-count">
                                    <?php if(isset($_SESSION['cart'])){
                                        echo sizeof($_SESSION['cart']);
                                    }else{
                                        echo 0;
                                    }
                                    ?>
                                    </span>
                                </sup>
                            </a> 
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- ===========================-->
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="./assets/images/banner/banner1.jpg" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/images/banner/banner2.jpg" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/images/banner/banner3.jpg" alt="Third slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/images/banner/banner4.jpg" alt="Third slide">
                  </div>assets
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
    </section>


    <section id="features">
        <div class="container-fluid">
            <h2>Our Features.</h2>
            <div class="row">
                <div class="col-lg-4">
                    <i class="fas fa-check-circle feature-icons"></i>
                    <h3>Simple</h3>
                    <p>Simple for the simples by the simples.</p>
                </div>
                <div class="col-lg-4">
                    <i class="fas fa-shipping-fast feature-icons"></i>
                    <h3>Fast</h3>
                    <p>2 day free shipping in the valley and much more.</p>
                </div>
                <div class="col-lg-4">
                    <i class="fas fa-tags feature-icons"></i>
                    <h3>Refundable</h3>
                    <p>We do easy refunds.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="price">
        <div class="container-fluid">
            <h2 class="price-heading">Price plans</h2>                                
            <div class="row">
            <?php foreach($price_plans as $index => $price_plan){ ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card this-is-card">
                        <div class="card-header">
                            <h3><?php echo $price_plan['pl_name'];?></h3>
                        </div>
                        <div class="card-body">
                            <h2>Rs.
                                <?php 
                                    echo 300-$price_plan['pl_discount'];
                                ?>/T-shirt.</h2>
                            <p><?php echo $price_plan['pl_qty'];?> T-Shirt bundle.</p>
                            <p>Rs.<?php echo $price_plan['pl_delivery']?> delivery charge.</p>
                            <p><?php echo $price_plan['pl_feature1'];?></p>
                            <p><?php echo $price_plan['pl_feature2'];?> </p>
                            <?php $_SESSION['pl_name'][$index] = $price_plan['pl_name'];?>
                            <form action="assets/php/view/view.php" method="POST" class="order-now-btn">
                                <input type="hidden" name="hidden-product-id" id="" value="<?php echo $price_plan['pl_id'];?>">
                                <input type="hidden" name="hidden-product-type" id="" value=<?php echo $price_plan['pl_name'];?>>
                                <input type="submit" name="order-now-btn" class="btn btn-dark btn-lg btn-block" value="Order Now">
                            </form>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>


    <section id="payment">
        <div class="container-fluid">
            <h2 class="payment-heading">Our payment partners.</h2>
            <div class="row payment-row">
                <div class="col-lg-4 col-sm-4 payment-div"> 
                    <img src="./assets/images/payment/paypal.jpeg" alt="paypal logo" class="payment-logo">
                </div>
                <div class="col-lg-4 col-sm-4 payment-div">
                    <img src="./assets/images/payment/khalti.jpeg" alt="khalti logo" class="payment-logo">
                </div>
                <div class="col-lg-4 col-sm-4 payment-div"> 
                    <img src="./assets/images/payment/esewa.jpeg" alt="esewa logo" class="payment-logo">
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-class" id="footer">
        <div class="row">
            <div class="footer-content col-md-6 col-sm-12">
                <h2 class="footer-heading">Find us at:</h2>
                <div class="socials">
                    <ul>
                        <li>
                            <a href="#"><i class="fab fa-facebook footer-icon"></i> @BnW|Ts</a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram footer-icon"></i> @BnW|Ts</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-content col-md-6 col-sm-12">
                    <h2 class="footer-heading">Address:</h2>
                    <div class="address">
                    <ul>
                        <li>
                            <a href="">
                                <i class="fas fa-map-marker" aria-hidden="true"></i> Khasibazar, Kirtipur, Kathmandu.
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fas fa-map-marker" aria-hidden="true"></i> Khasibazar, Kirtipur, Kathmandu.
                            </a>
                        </li>
                        <li>
                            <a href="../view/admin.php">Admin</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row footer-bottom">
            <div class="col">
                <p">copyright &copy;2021 ourcode. designed by <u>ME.<u></p>
            </div>
        </div>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>