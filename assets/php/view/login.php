<?php
include "../partials/_configure.php";
session_start();
if(isset($_POST['login-btn'])){
    $email = $_POST['email'];
    $pword = $_POST['password'];
    if(empty($email)){
        $error = "Email cannot be empty.";
    }
    elseif(empty($pword)){
        $error = "Password cannot be empty.";
    }
    elseif(empty($email) && empty($pword)){
        $error = "Fields cannot be empty.";
    }
    else{
        $error = "";
        include_once '../partials/_configure.php';
        $sql = "SELECT u_id, u_name, u_email, u_password FROM tbl_user WHERE u_email = '$email'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $i = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $datas[$i] = array(
                    "id" => $row['u_id'],
                    "fullname" => $row['u_name'],
                    "email" => $row['u_email'],
                    "password" => $row['u_password'],
                );
                $i++;
            }
            $hash = password_hash($pword, PASSWORD_DEFAULT);
            if(password_verify($pword, $datas[0]['password'])){
                $_SESSION['id'] = $datas[0]['id'];
                $_SESSION['username'] = $datas[0]['fullname'];
                mysqli_close($conn);
                header("Location:/ecommerce/assets/php/view/user.php");
            }
            else{
                $error = "Password Incorrect."; 
            }
        }
        else{
            $error = "Account Doesn't Exist."; 
        }
    }
}
else{
    $error = "";
}
mysqli_close($conn);
?>

<?php include_once '../partials/_html_p1.php' ;?>
<title>Login</title>
<?php include_once '../partials/_html_p2.php';?>
<?php include_once '../partials/_nav.php'?>	
<section class="bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
    <div id="login-container" class="container-fluid bordered">
        <div id="l-form-container" class="l-form-container w-50 bordered bg-light mx-auto">
            <h1>Account Login</h1>
            <form action="login.php" method="POST">
                <div class="row form-group">
                    <?php if(!empty($error)){?> 
                    <span class="alert alert-danger w-100" role="alert">
                       <?php echo $error;?>
                    </span>
                    <?php }?>
                    <input type="email" id="email" class="form-control input-field" name="email" required>
                    <label for="email">Your Email</label>
                </div>
                <div class="row form-group">
                    <input type="password" id="password" class="form-control input-field" name="password" required>
                    <label for="password">Your Password</label>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6"><input type="checkbox" name="remember-me" id="remember-me"> Remember Me.</div>
                    <div class="col-lg-6" style="text-align: right"><a href="">Forgot Password?</a></div>
                </div>
                <div class="row form-group">
                    <input type="submit" name="login-btn" id="login-btn" class="btn btn-lg btn-success w-50 mx-auto" value="Login" >
                </div>
            </form>   
            <div class="ml-auto"><p>Don't have an account?<a href="register.php">Register</a>.</p></div>
        </div>
    </div>
</section>

<?php include_once '../partials/_footer.php'?>