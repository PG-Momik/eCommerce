<?php 
session_start();
if(isset($_POST)){
    $index = $_POST['hidden-cart-row-value'];
    array_splice($_SESSION['cart'], $index, 1);
    echo sizeof($_SESSION['cart']);
    for($i=0; $i <sizeof($_SESSION['cart']); $i++){
 
        $_SESSION['cart'] = $_SESSION['cart'];
        
    }
    // echo "<pre>";
    // var_dump($_SESSION['cart']);
    // echo "</pre>";
    header("Location:../view/cart.php");
}






?>