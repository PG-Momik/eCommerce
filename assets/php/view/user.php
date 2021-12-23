<?php
    include_once "../partials/_configure.php";
    session_start();
?>
<?php include_once '../partials/_html_p1.php' ;?>

<title>Account</title>

<?php include_once '../partials/_html_p2.php';?>
<?php include_once '../partials/_nav.php';?>

<section class="bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
    <div class="divv">
        
        <?php include_once '../partials/_user_side_nav.php';?>

        <div class="account-content mx-auto">
            <h2></h2>
            <p>
                <?php
                    if(isset($_SESSION['profile-update'])){
                        echo "<div class='alert alert-success'>Profile Updated</div>";
                        unset($_SESSION['profile-update']);
                    }
                ?>
            </p>
        </div>
    </div>
</section>

<?php include '../partials/_footer.php';?>
