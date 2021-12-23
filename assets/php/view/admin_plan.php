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
            "pl_feature1" => $row['pl_feature1'],
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
            <h1 class="admin-header">Price Plans</h1>
                <table class="admin-batta-right table table-dark">
                    <thead>
                        <tr>
                            <td><b>P-id</b></td>
                            <td><b>Name</b></td>
                            <td><b>Discount</b></td>
                            <td><b>Delivery</b></td>
                            <td><b>Quantity</b></td>
                            <td><b>Feature 1</b></td> 
                            <td><b>Feature 2</b></td>
                            <td><b>Action</b></td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $size= sizeof($plans); ?>
                    <?php for($i=0;$i<$size;$i++){?>
                        <tr>
                            <td><?php echo $plans[$i]['pl_id']; ?></td>
                            <td><?php echo $plans[$i]['pl_name']; ?></td>
                            <td><?php echo $plans[$i]['pl_discount']; ?></td>
                            <td><?php echo $plans[$i]['pl_delivery']; ?></td>
                            <td><?php echo $plans[$i]['pl_qty']; ?></td>
                            <td><?php echo $plans[$i]['pl_feature1'];?></td>
                            <td><?php echo $plans[$i]['pl_feature2'];?></td>
                            <td style="display:flex; grid-column-gap: 0.8rem; margin-top:-1px">
                                <form action="update_plan.php" method="POST">
                                    <input type="hidden" name="plan-id" id="" value="<?php echo $plans[$i]['pl_id']?>">
                                    <button type="submit" class="btn btn-md btn-success" name="update-process"><i class="fas fa-edit"></i></button>
                                </form>
                                <form action="../partials/_delete_plan.php" method="POST">
                                    <input type="hidden" name="plan-id" id="" value="<?php echo $plans[$i]['pl_id']?>">
                                    <button type="submit" class="btn btn-md btn-danger" name="delete-process"><i class="fas fa-trash"></i></button>
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
 
