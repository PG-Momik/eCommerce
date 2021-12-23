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
            <h1 class="admin-header">Users</h1>
                <table class="admin-batta-right table table-dark">
                    <thead>
                        <tr>
                            <td><b>User ID</b></td>
                            <td><b>Full Name</b></td>
                            <td><b>Address</b></td>
                            <td><b>Email</b></td>
                            <td><b>Type</b></td>
                            <td><b>Action</b></td>
                       </tr>
                    </thead>
                    <tbody>
                    <?php $size= sizeof($users); ?>
                    <?php for($i=0; $i<$size; $i++){?>
                        <tr>
                            <td><?php echo $users[$i]['u_id']; ?></td>
                            <td><?php echo $users[$i]['u_name']; ?></td>
                            <td><?php echo $users[$i]['u_address']; ?></td>
                            <td><?php echo $users[$i]['u_email']; ?></td>
                            <td><?php echo $users[$i]['u_type']; ?></td>
                            <td style="display:flex; grid-column-gap: 0.8rem; margin-top:-1px">
                                <form action="update_user.php" method="POST">
                                    <input type="hidden" name="user-id" id="" value="<?php echo $users[$i]['u_id']?>">
                                    <button type="submit" class="btn btn-success" name="update-process"><i class="fas fa-edit"></i></button>
                                </form>
                                <form action="../partials/_delete_user.php" method="POST">
                                    <input type="hidden" name="user-id" id="" value="<?php echo $users[$i]['u_id']?>">
                                    <button type="submit" class="btn btn-danger" name="delete-process"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>      
            </div>
        </div>
    </div>
</section>
<hr>
<?php include_once '../partials/_footer.php' ?>
<hr>