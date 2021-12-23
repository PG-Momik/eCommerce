<?php
if(isset($_POST)){
    if(isset($_POST['u-btn'])){
        $id = $_POST['o-id'];
        updateStatus($id,"Unshipped");
    }elseif (isset($_POST['s-btn'])){
        $id = $_POST['o-id'];
        updateStatus($id,"Shipped");
    }else{
        $id = $_POST['o-id'];
        updateStatus($id,"Delivered");
    }
}else{
    echo "Cannot access this page.";
}

function updateStatus($id,$status){
    include_once "_configure.php";
    $sql = "UPDATE tbl_delivery SET 
    d_status = '$status'
    WHERE d_id = '$id'";
    if (mysqli_query($conn, $sql)){
        echo "<script>alert('Records updated successfully')</script>";
        echo "<script>window.location.href='../view/admin_order.php'</script>";
    }else{
        echo "Failed to update record.";
    }
}


?>