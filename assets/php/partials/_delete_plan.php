<?php 
if (isset($_POST)){
    if(isset($_POST['delete-process'])){
        $id = $_POST['plan-id'];
        include_once "_configure.php";
        $sql = "DELETE FROM tbl_price_plan WHERE pl_id = '$id'";
        if (mysqli_query($conn, $sql)){
            echo "<script>alert('Records deleted successfully')</script>";
            echo "<script>window.location.href='../view/admin_product.php'</script>";
        }else{
            echo "Record could not be deleted.";
        }
    }else{
        Header("Location:../view/admin_plan.php");
    }
}else{
    echo "Cannot access this page.";
}
?>