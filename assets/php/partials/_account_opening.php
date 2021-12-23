<?php
include_once "../partials/_configure.php";
session_start();
?>
<?php include_once '../partials/_html_p1.php' ;?>
<title><?php echo $_SESSION['username']?></title>
<?php include_once '../partials/_html_p2.php';?>
<?php include_once '../partials/_nav.php';?>
<section class="bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
    <div class="divv">
        <?php include_once '_user_side_nav.php';?>
        <div class="account-content mx-auto">