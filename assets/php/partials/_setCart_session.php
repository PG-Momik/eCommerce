<?php
   session_start();
    $_SESSION['cart'][] = array(
        'id' => $_POST['hidden-for-cart-id'],
        'image' =>$_POST['hidden-for-cart-image'],
        'name' =>$_POST['hidden-for-cart-name'],
        'type' =>$_POST['hidden-for-cart-type'],
        'price' =>$_POST['hidden-for-cart-price'],
    );
    header("location:../view/cart.php");

?>