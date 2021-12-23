<?php
include_once '../partials/_configure.php';
?>
<?php
    $sql='SELECT
            tbl_order.o_id, tbl_order.o_bill, tbl_order.o_date,
            tbl_user.u_name, tbl_user.u_email,
            tbl_products.pr_name, tbl_products.pr_price,
            tbl_price_plan.pl_name,
            tbl_delivery.d_status
            FROM tbl_order
            JOIN tbl_user on tbl_order.u_id = tbl_user.u_id
            JOIN tbl_products on tbl_order.pr_id = tbl_products.pr_id
            JOIN tbl_price_plan on tbl_order.pl_id = tbl_price_plan.pl_id
            JOIN tbl_delivery on tbl_order.o_id = tbl_delivery.o_id
            ORDER BY tbl_order.o_date DESC' ;
            //Fetching result from database
            $result = mysqli_query($conn, $sql);
            
            //Checking if there is data saved in the students table.
            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $i = 0;
                // Looping through the results
                while($row = mysqli_fetch_assoc($result)) {
                    $order[$i] = array(
                    "o_id" => $row['o_id'],
                    "o_bill" => $row['o_bill'],
                    "u_name" => $row['u_name'],
                    "u_email" => $row['u_email'],
                    "pr_name" => $row['pr_name'],
                    "pr_price" => $row['pr_price'],
                    "pl_name" => $row['pl_name'],
                    "d_status" => $row['d_status'],
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
                <h1 class="admin-header">Orders</h1>
                <table class="admin-batta-right table table-dark">
                    <thead>
                        <tr>
                            <td><b>SN.</b></td>
                            <td><b>Order Id</b></td>
                            <td><b>User Info</b></td>
                            <td><b>Product Info</b></td>
                            <td><b>Bill no.</b></td>
                            <td><b>Status</b></td>
                            <td><b>Mark as</b></td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $size= sizeof($order); ?>
                        <?php for($j=0;$j<$size;$j++){?>
                        <tr>
                            <td><?php echo $j+1; ?></td>
                            <td><?php echo $order[$j]['o_id']; ?></td>
                            <td><?php echo $order[$j]['u_name'].'<br>'.$order[$j]['u_email']; ?></td>
                            <td><?php echo $order[$j]['pl_name']." ".$order[$j]['pr_name'].'<br>'.'Rs.'.$order[$j]['pr_price']; ?></td>
                            <td><?php echo $order[$j]['o_bill']; ?></td>
                            <td><?php echo $order[$j]['d_status']; ?></td>
                            <td style="display:flex;">
                                <form action="../partials/_update_order.php" method="POST">
                                    <input type="hidden" name="o-id"  value="<?php echo $order[$j]['o_id'];?>" readonly>    
                                    <input type="submit" name="u-btn" value="Unshipped" class="btn btn-sm btn-danger">
                                    <input type="submit" name="s-btn" value="Shipped" class="btn btn-sm btn-primary">
                                    <input type="submit" name="d-btn" value="Delivered" class="btn btn-sm btn-success">
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>


<?php include_once '../partials/_footer.php'; ?>

