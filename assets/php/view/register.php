<?php
include "../partials/_configure.php";
session_start();
if(isset($_POST['register-btn'])){
    if(isset($_POST['terms-checkbox'])){
        $full_name = $_POST['full-name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $con_password = $_POST['confirm-password'];
	    //name verification
	    if(empty($full_name)){
		    $error1 = "Cannot Be Empty.";
	    }
    	else{
		// check if name only contains letters and whitespace
		    if(!preg_match("/^[a-zA-Z-' ]*$/",$full_name)) {
		        $error1 = "Invalid Name.";
		    }
		    else{
			    $error1 = "";
		    }
	    }
        //email verification
        if(empty($email)){
            $error2 = "Email is required.";
        } 
        else{
            // check if e-mail address is well-formed
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error2 = "Invalid email format.";
            }
            else{
	    		$error2="";
		    }   
	    }
	    //address verification
	    $error3 = "";
	    //password and con verification
	    if(empty($password)){
		    $error4 = "Password required.";
	    }
	    else{
		    $error4 = "";
	    }
	    if(empty($con_password)){
		    $error5 = "Confirm Password required.";
	    }
	    else{
		    if($password!=$con_password){
			    $error4 = "Password must be same.";
                $error5 = "Confirm Password must be same.";
            }
            else{
                $error4 = "";
                $error5 = "";
            }
    	}
	    $acc_check = "";
        // password hash    $result = mysqli_query($conn, $sql_getProducts);

        if($error1 == "" && $error2 == "" && $error3 == "" && $error4 == "" && $error5 == ""){
            $hash1 = password_hash($password, PASSWORD_DEFAULT);
            $sql = "SELECT * FROM ecommerce.tbl_user WHERE u_email = '".$email."'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_fetch_assoc($result);
            if($count > 0){ 
            $acc_check = "Account Already Exists.";
            }
            else{
                $sql2 = "INSERT into tbl_user (u_name, u_email, u_address, u_password) VALUES ('$full_name','$email','$address','$hash1')";
                if(mysqli_query($conn, $sql2)){
                    header('Location: login.php');
                }
            }
        }
	//if errors
	//sql
    }
    else{
        $error1="";
        $error2="";
        $error3="";
        $error4="";
        $error5="";
        $acc_check="Please read the Terms and Condition."; 
    }
}
else{
	$error1="";
	$error2="";
	$error3="";
	$error4="";
	$error5="";
	$acc_check="";
}

?>
<?php include_once '../partials/_html_p1.php' ;?>
<title>Register</title>
<?php include_once '../partials/_html_p2.php';?>
<?php include_once '../partials/_nav.php'?>	
<section class="bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
    <div id="register-container" class="container-fluid bordered">
        <div id="r-form-container" class="r-form-container w-50 bordered mx-auto">
            <h1>Create Your Account</h1>
            <p>-----Its free, simple and takes only one minute to fill up-----</p>
            <form action="register.php" method="POST">
                <div class="row form-group">
                   <?php if(!empty($error1)){?> 
                    <span class="alert alert-danger w-100" role="alert">
                       <?php echo $error1;?>
                    </span>
                    <?php }?>
                    <input type="text" id="full-name" class="form-control input-field" name="full-name" required>
                    <label for="full-name">Your Name</label>
                </div>
                <div class="row form-group">
                    <?php if(!empty($error3)){?> 
                        <span class="alert alert-danger w-100" role="alert">
                        <?php echo $error3;?>
                        </span>
                    <?php }?>
                    <input type="text" id="address" class="form-control input-field" name="address" required>
                    <label for="address">Your Address</label>
                </div>
                <div class="row form-group">
                <?php if(!empty($error2)){?> 
                    <span class="alert alert-danger w-100" role="alert">
                       <?php echo $error2;?>
                    </span>
                    <?php }?>
                    <input type="email" id="email" class="form-control input-field" name="email" required>
                    <label for="email">Your Email</label>
                </div>
                <div class="row form-group">
                <?php if(!empty($error4)){?> 
                    <span class="alert alert-danger w-100" role="alert">
                       <?php echo $error4;?>
                    </span>
                    <?php }?>
                    <input type="password" id="password" class="form-control input-field" name="password" required>
                    <label for="password">Your Password</label>
                </div>
                <div class="row form-group">
                <?php if(!empty($error5)){?> 
                    <span class="alert alert-danger w-100" role="alert">
                       <?php echo $error5;?>
                    </span>
                    <?php }?>
                    <input type="password" id="confirm-password" class="form-control input-field" name="confirm-password" required>
                    <label for="confirm-password">Repeat Your Password</label>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="terms-checkbox" id="terms-checkbox" required> I have read and agreed to all the <a href="">Terms & condition</a>.
                </div>
                <div class="row form-group">
                <?php if(!empty($acc_check)){?> 
                    <span class="alert alert-danger w-100" role="alert">
                       <?php echo $acc_check;?>
                    </span>
                    <?php }?>
                    <input type="submit" name="register-btn" id="register-btn" class="btn btn-lg btn-success w-50 mx-auto" value="Register" disabled="true">
                </div>
            </form>
            <div class="ml-auto"><p>Already have an account?<a href="login.php">Login</a>.</p></div>
        </div>
    </div>
</section>
<script>
var terms = document.getElementById("terms-checkbox");
terms.addEventListener("click", function(){
    document.getElementById("register-btn").toggleAttribute("disabled");
})


    
</script>
<?php include_once '../partials/_footer.php'?>