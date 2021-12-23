<?php
//load session
session_start();
//deleting session variables
if(isset($_SESSION['username'])){
    session_unset();
    //destroying session 
    unset($_SESSION['pl_name']);
    unset($_SESSION['cart']);
    unset($_SESSION['username']);
    session_destroy();
    header('Location:/ecommerce/index.php');
}


?>