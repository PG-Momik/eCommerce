<?php
    if(isset($_POST['user-id'])){
        $id = $_POST['user-id'];
?>
<?php include_once '../partials/_configure.php';?>
<?php 
    $sql='SELECT u_id, u_name, u_address, u_email, u_type FROM tbl_user';
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $i=0;
        while($row = mysqli_fetch_assoc($result)) {
            $users[$i] = array(
                "u_id" => $row['u_id'],
                "u_name" => $row['u_name'],
                "u_address" => $row['u_address'],
                "u_email" => $row['u_email'],
                "u_type" => $row['u_type'],
            );
            $i++;
        }
    }
?>
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
        <div class="admin-batta">
            <?php include_once '../partials/_admin_side_nav.php';?>
            <div class="account-content mx-auto">
            <form action="../partials/_update_user.php" method="POST" class="bordered admin-batta-right">
                <div class="form-group row">
                    <label for="user-id" class="col-sm-2 col-form-label">ID:</label>
                    <div class="col-sm-10">
                        <input type="text" name="u-id" readonly class="form-control" id="user-id" value="<?php echo $users[0]['u_id']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="new-name" class="form-control" id="user-name" value="<?php echo $users[0]['u_name']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-address" class="col-sm-2 col-form-label">Address:</label>
                    <div class="col-sm-10">
                        <input type="text" name="new-address" class="form-control" id="user-address" value="<?php echo $users[0]['u_address']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-email" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" name="new-email" class="form-control" id="user-email" value="<?php echo $users[0]['u_email']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-type" class="col-sm-2 col-form-label">Type:</label>
                    <div class="col-sm-10">
                        <input type="text" name="new-type" class="form-control" id="user-type" value="<?php echo $users[0]['u_type']?>">
                    </div>
                </div>
                <div class="form-group row" style="text-align">
                    <div class="col-sm-5">
                        <input type="submit" class="btn btn-primary" value="Update" name="update-process">
                    </div>
                    <div class="col-sm-5">
                        <input type="submit" class="btn btn-danger" value="Cancel" name="cancel-process">
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>
<hr>
<?php include_once '../partials/_footer.php' ?>
<hr>

<?php   
}else{
    echo "Cannot access this page";
}

?>