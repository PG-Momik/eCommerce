<?php 
if (isset($_POST)){
    if(isset($_POST['update-process'])){
        $id = $_POST['pr-id'];
        $name = $_POST['new-name'];
        $price =  $_POST['new-price'];
        $stock = $_POST['new-stock'];
        $description = $_POST['new-description'];
        $date = date('Y-m-d H:i:s');
        $file = $_FILES['new-picture'];
        $fileName = $_FILES['new-picture']['name'];
        $fileTmp = $_FILES['new-picture']['tmp_name'];
        $fileSize = $_FILES['new-picture']['size'];
        $fileError =$_FILES['new-picture']['error'];
        $fileType = $_FILES['new-picture']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt  = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 2500000){
                 $fileActualName = "product_".$id.'a'.'.'.$fileActualExt;
                 $fileDestination  = 'images/product/'.$fileActualName;
                 include_once '_configure.php';
                 $sql = "UPDATE tbl_products SET
                  pr_name = '$name',
                  pr_price = '$price', 
                  pr_stock = '$stock', 
                  pr_description = '$description', 
                  pr_add_date = '$date',
                  pr_picture = '$fileDestination' 
                  WHERE pr_id = '$id'";
                  if(mysqli_query($conn, $sql)){
                    $fileDestination  = '../../images/product/'.$fileActualName;
                    move_uploaded_file($fileTmp, $fileDestination);
                    echo "<script>alert('Records added successfully')</script>";
                    echo "<script>window.location.href='../view/admin_products.php'</script>";
                  }else{
                    echo "Failed to update record.";
                  }
                }else{
                    echo "Photo too large.";
                }
            }else{
                echo "Error uploading file.";
            }
        }else{
            echo "Can't upload this file format.";
        }
    }else{
    Header("Location:../view/admin_products.php");
    }
}
else{
    echo "Cannot access this page.";
}
?>
