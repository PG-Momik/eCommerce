<?php
    include_once "../partials/_configure.php";
    session_start();
?>
<?php include_once '../partials/_html_p1.php' ;?>

<title>Admin</title>

<?php include_once '../partials/_html_p2.php';?>
<?php include_once '../partials/_nav.php';?>

<section class="bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
    <div class="divv">
        <div class="sidenav">
            <ul>

                <li class="nav-item"><a href="admin_testimonial.php" class="nav-link">Deliveries<i class="fas fa-shipping-fast"></i></a></li>
                <li class="nav-item"><a href="../partials/_logout.php" class="nav-link">Logout<i class="fas fa-sign-in-alt"></i></a></li>
            </ul>
        </div>
        <div class="account-content mx-auto">
            <h2></h2>
            <p>
                <?php
                    if(isset($_SESSION['profile-update'])){
                        echo "<div class='alert alert-success'>Profile Updated</div>";
                        unset($_SESSION['profile-update']);
                        echo $_SESSION['profile-update'];
                    }
                ?>
                <pre><?php var_dump($_SESSION)?></pre>
            </p>
        </div>
    </div>
</section>

<?php include '../partials/_footer.php';?>
