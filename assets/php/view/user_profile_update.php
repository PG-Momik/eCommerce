
<?php include '../partials/_account_opening.php';?>
<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    $sql_getUser = "SELECT u_id, u_name, u_email, u_address  FROM tbl_user where u_id = '".$_SESSION['id']."'";
    $result = mysqli_query($conn, $sql_getUser);
        if (mysqli_num_rows($result) > 0) {
            $i = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $datas[$i] = array(
                    "u-id" => $row['u_id'],
                    "user" => $row['u_name'],
                    "email" => $row['u_email'],
                    "address" => $row['u_address'],
                );
                $i++;
            }
        }
    $sql_getOrder = "SELECT * from tbl_order where u_id = '".$_SESSION['id']."'";        
    $result = mysqli_query($conn, $sql_getOrder);
    $no_of_orders = mysqli_num_rows($result);
?>
<?php 
    if(isset($_POST['update-profile-btn-2'])){
        $sql = "SELECT u_password FROM tbl_user where u_id = '".$_SESSION['id']."'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $i = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $data[$i] = array(
                    "password" => $row['u_password'],
                );
                $i++;
            }
            if(password_verify($_POST['password'], $data[0]['password'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $sql = "UPDATE tbl_user SET 
                u_name = '$name', 
                u_address = '$address', 
                u_email = '$email' 
                WHERE u_id = '".$_SESSION['id']."'"; 
                echo $sql;
                $result_2= mysqli_query($conn, $sql);
                $_SESSION['profile-update'] = 1;
                header("Location:/ecommerce/assets/php/view/user_profile.php?");
            }else{
                $error = "Enter correct password to update info.";
                
            }

        }
        
    }
?>
<div class="user-batta">
<table class="table bg-light shadow">
    <h1>Update Profile</h1>
    <form action="user_profile_update.php" method="POST">
        <tr>
            <th><label for="name">Username</label></th>
            <td><input type="text" id="name" value='<?=$datas[0]['user'];?>' class="form-control input-field" name="name" required></td>
        <tr>
        <tr>
            <th><label for="email">Email</label></th>
            <td><input type="email" id="email" value='<?=$datas[0]['email'];?>' class="form-control input-field" name="email" required></td>
        <tr>
        <tr>
            <th><label for="address">Address</label></th>
            <td><input type="text" id="address" value='<?=$datas[0]['address'];?>' class="form-control input-field" name="address" required></td>
        <tr>
        <tr>
            <?php 
            if(isset($error)){
                echo "<div class='alert alert-danger'>".$error."</div>";
            }
            ?>
            <th><label for="password">Confirm Password</label></th>
            <td><input type="password" id="password" placeholder="Password required to update" class="form-control input-field" name="password" required></td>
        <tr>
        <tr style="text-align:center">
            <td colspan="2">
                    <input type="hidden" name="user-id" id="user-id" value="<?php echo $datas[0]['u-id'];?>">
                    <input type="submit" name="update-profile-btn-2" id="update-profile-btn" class="btn btn-primary" value="Update">
            </td>
        </tr>
    </form>
</table>
</div>
<?php include '../partials/_account_closure.php';?>
<?php include '../partials/_footer.php';?>
