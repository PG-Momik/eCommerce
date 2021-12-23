<?php 
if (isset($_POST)){
    if(isset($_POST['update-process'])){
        $id = $_POST['u-id'];
        $name = $_POST['new-name'];
        $address =  $_POST['new-address'];
        $email = $_POST['new-email'];
        $type = $_POST['new-type'];
        include_once "_configure.php";
        $sql = "UPDATE tbl_user SET 
        u_name = '$name', 
        u_address =  '$address',
        u_email = '$email',
        u_type = '$type'
        WHERE u_id = '$id'";
        if (mysqli_query($conn, $sql)){
            echo "<script>alert('Records added successfully')</script>";
            echo "<script>window.location.href='../view/admin_user.php'</script>";
        }else{
            echo "Failed to update record.";
        }

    }
    else{
        Header("Location:../view/admin_user.php");
    }
}
else{
    echo "Cannot access this page.";
}
?>