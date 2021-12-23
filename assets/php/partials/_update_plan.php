<?php 
if (isset($_POST)){
    if(isset($_POST['update-process'])){
        $id = $_POST['pl-id'];
        $name = $_POST['new-name'];
        $discount =  $_POST['new-discount'];
        $delivery = $_POST['new-delivery'];
        $qty = $_POST['new-quantity'];
        $f1 = $_POST['new-f1'];
        $f2 = $_POST['new-f2'];
        include_once "_configure.php";
        $sql = "UPDATE tbl_price_plan SET 
        pl_name = '$name', 
        pl_discount = '$discount',
        pl_delivery = '$delivery',
        pl_qty = '$qty',
        pl_feature1 = '$f1',
        pl_feature2 = '$f2' 
        WHERE pl_id = '$id'";
        if (mysqli_query($conn, $sql)){
            echo "<script>alert('Records added successfully')</script>";
            echo "<script>window.location.href='../view/admin_plan.php'</script>";
        }else{
            echo "Failed to update record.";
        }

    }
    else{
        Header("Location:../view/admin_plan.php");
    }
}
else{
    echo "Cannot access this page.";
}
?>