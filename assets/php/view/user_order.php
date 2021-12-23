<?php include '../partials/_account_opening.php';?>
<?php 
if(!isset($_SESSION)){
    session_start();
}
$sql_getOrder = "SELECT tbl_order.o_id, 
                        tbl_products.pr_name, 
                        tbl_products.pr_price,
                        tbl_price_plan.pl_name,
                        tbl_price_plan.pl_discount,
                        tbl_price_plan.pl_delivery,
                        tbl_order.o_date  
                        from tbl_order 
                        JOIN tbl_user ON tbl_order.u_id = tbl_user.u_id
                        JOIN tbl_products ON tbl_order.pr_id = tbl_products.pr_id 
                        JOIN tbl_price_plan ON tbl_order.pl_id = tbl_price_plan.pl_id 
                        WHERE tbl_user.u_id = ".$_SESSION['id']; 

$result = mysqli_query($conn, $sql_getOrder);
if (mysqli_num_rows($result) > 0) {
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
      $orders[$i] = array(
        "o_id" => $row['o_id'],
        "o_name" => $row['pr_name'],
        "o_price" => $row['pr_price'],
        "o_type" => $row['pl_name'],
        "o_discount" => $row['pl_discount'],
        "o_delivery" => $row['pl_delivery'],
        "o_date" => $row['o_date'],
    );
      $i++;
    }
}
?>
<div class="user-batta">
<table class="table bg-light shadow">
    <h1>Orders</h1>
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Price</th>
            <th scope="col">Discount</th>
            <th scope="col">Delivery</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0; $i<sizeof($orders); $i++){?>
            <tr>
            <td><?php echo $orders[$i]['o_id']?></td>
            <td><?php echo $orders[$i]['o_name']?></td>
            <td><?php echo $orders[$i]['o_type']?></td>
            <td><?php echo $orders[$i]['o_price']?></td>
            <td><?php echo $orders[$i]['o_discount']?></td>
            <td><?php echo $orders[$i]['o_delivery']?></td>
            <td><?php echo $orders[$i]['o_date']?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<?php include '../partials/_account_closure.php';?>
<?php include '../partials/_footer.php';?>
