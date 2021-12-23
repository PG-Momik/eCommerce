
<div class="main container-fluid">
    <nav class="nav navbar-expand-lg navbar-dark bg-dark this-is-nav">
        <a href="/ecommerce/index.php" class="navbar-brand nav-brand-selector">B&W|Ts</a>
        <button class="navbar-toggler ml-auto burger-item-selector" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">                
                <li class="nav-item">
                    <a href="../../../index.php#price" class="nav-link"><i class="fas fa-rupee-sign"></i>Price Plans</a> 
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
                    <a href="/ecommerce/assets/php/view/cart.php" class="nav-link">
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
</div>