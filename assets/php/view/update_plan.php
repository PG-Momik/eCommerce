<?php
    if(isset($_POST['update-process'])){
        $id = $_POST['plan-id'];
?>


<?php include_once '../partials/_configure.php';?>
<?php 
    $sql='SELECT * FROM tbl_price_plan';
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $i=0;
        while($row = mysqli_fetch_assoc($result)) {
            $plans[$i] = array(
                "pl_id" => $row['pl_id'],
                "pl_name" => $row['pl_name'],
                "pl_discount" => $row['pl_discount'],
                "pl_delivery" => $row['pl_delivery'],
                "pl_qty" => $row['pl_qty'],
                "pl_feature1" =>$row['pl_feature1'],
                "pl_feature2" => $row['pl_feature2'],
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
            <form action="../partials/_update_plan.php" method="POST" class="bordered admin-batta-right">
                <div class="form-group row">
                    <label for="user-id" class="col-sm-4 col-form-label">ID:</label>
                    <div class="col-sm-8">
                        <input type="text" name="pl-id" readonly class="form-control" id="plan-id" value="<?php echo $plans[0]['pl_id']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-name" class="col-sm-4 col-form-label">Name:</label>
                    <div class="col-sm-8">
                        <input type="text" name="new-name" class="form-control" id="plan-name" value="<?php echo $plans[0]['pl_name']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-address" class="col-sm-4 col-form-label">Discount:</label>
                    <div class="col-sm-8">
                        <input type="number" name="new-discount" class="form-control" id="plan-discount" value="<?php echo $plans[0]['pl_discount']?>" min=0>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-email" class="col-sm-4 col-form-label">Delivery:</label>
                    <div class="col-sm-8">
                        <input type="number" name="new-delivery" class="form-control" id="plan-delivery" value="<?php echo $plans[0]['pl_delivery']?>" min=0 max=200>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-type" class="col-sm-4 col-form-label">Quantity:</label>
                    <div class="col-sm-8">
                        <input type="number" name="new-quantity" class="form-control" id="plan-quantity" value="<?php echo $plans[0]['pl_qty']?>" min=1 max=50>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-type" class="col-sm-4 col-form-label">Feature 1:</label>
                    <div class="col-sm-8">
                        <input type="text" name="new-f1" class="form-control" id="plan-f1" value="<?php echo $plans[0]['pl_feature1']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-type" class="col-sm-4 col-form-label">Feature 2:</label>
                    <div class="col-sm-8">
                        <input type="text" name="new-f2" class="form-control" id="plan-f2" value="<?php echo $plans[0]['pl_feature2']?>">
                    </div>
                </div>
                
                <div class="form-group row" style="text-align:right">
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
    echo "Cannot access this page.";
    }


?>