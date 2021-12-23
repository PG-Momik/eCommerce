<?php include '../partials/_account_opening.php';?>
<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    $sql_getDelivery = "SELECT 
                        tbl_delivery.d_id,
                        tbl_delivery.o_id,
                        tbl_products.pr_name,
                        tbl_price_plan.pl_name,
                        tbl_delivery.d_destination,
                        tbl_delivery.d_status
                        from tbl_delivery 
                            JOIN tbl_order ON tbl_delivery.o_id = tbl_order.o_id
                            JOIN tbl_price_plan on tbl_price_plan.pl_id = tbl_order.pl_id
                            JOIN tbl_products on tbl_products.pr_id = tbl_order.pr_id
                            JOIN tbl_user on tbl_user.u_id = tbl_order.u_id
                            WHERE tbl_user.u_id = '".$_SESSION['id']."'"; 

    $result = mysqli_query($conn, $sql_getDelivery);
    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
        $delivery[$i] = array(
            "d_id" => $row['d_id'],
            "o_id" => $row['o_id'],
            "pr_name" => $row['pr_name'],
            "pl_name" => $row['pl_name'],
            "d_destination" => $row['d_destination'],
            "d_status" => $row['d_status'],
        );
        $i++;
        }
    }
?>
<div class="user-batta">
<table class="table bg-light shadow">
    <h1>Delivery</h1>
    <thead class="thead-dark">
        <tr>
            <th scope="col">SN</th>
            <th scope="col">Order ID</th>
            <th scope="col">Order Name</th>
            <th scope="col">Delivery Destination</th>
            <th scope="col">Delivery status</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0; $i<sizeof($delivery); $i++){?>
            <tr>
            <td><?php echo $i+1;?></td>
            <td><?php echo $delivery[$i]['o_id']?></td>
            <td><?php echo $delivery[$i]['pr_name']." - ".$delivery[$i]['pl_name']?></td>
            <td><?php echo $delivery[$i]['d_destination']?></td>
            <td><?php echo $delivery[$i]['d_status']?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</div>
<?php include '../partials/_account_closure.php';?>
<?php include '../partials/_footer.php';?>
