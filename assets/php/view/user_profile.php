
<?php include '../partials/_account_opening.php';?>
<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    $sql_getUser = "SELECT u_name, u_email, u_address  FROM tbl_user where u_id = '".$_SESSION['id']."'";
    $result = mysqli_query($conn, $sql_getUser);
        if (mysqli_num_rows($result) > 0) {
            $i = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $datas[$i] = array(
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
<div class="user-batta">
 <table class="table bg-light shadow">
    <h1>Profile</h1>
    <tr>
        <th>User:</th>
        <td><?php echo $datas[0]['user'];?></td>
    <tr>
    <tr>
        <th>E-mail:</th>
        <td><?php echo $datas[0]['email'];?></td>
    <tr>
    <tr>
        <th>Address</th>
        <td><?php echo $datas[0]['address'];?></td>
    <tr>
    <tr>
        <th>Purchases Made:</th>
        <td><?php echo $no_of_orders;?></td>
    <tr>
    <tr style="text-align:center">
        <td colspan="2">
            <form action="user_profile_update.php" method="POST">
                <input type="submit" name="update-profile-btn" id="update-profile-btn" class="btn btn-primary" value="Update info">
            </form>
        </td>
    </tr>
</table>
</div>

<?php include '../partials/_account_closure.php';?>
<?php include '../partials/_footer.php';?>
