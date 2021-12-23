<?php include_once '../partials/_configure.php';?>
<?php
$sql='SELECT * FROM tbl_products';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
        $products[$i] = array(
            "pr_id" => $row['pr_id'],
            "pr_name" => $row['pr_name'],
            "pr_price" => $row['pr_price'],
            "pr_picture" => $row['pr_picture'],
            "pr_stock" => $row['pr_stock'],
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
            <h1 class="admin-header">Products</h1>
                <table class="admin-batta-right table table-dark">
                    <thead>
                        <tr>
                            <td><b>P-id</b></td>
                            <td><b>Name</b></td>
                            <td><b>Price</b></td>
                            <td><b>Picture</b></td>
                            <td><b>Stock</b></td>
                            <td><b>Action</b></td> 
                        </tr>
                    </thead>
                    <tbody>
                    <?php $size= sizeof($products); ?>
                    <?php for($i=0;$i<$size;$i++){?>
                        <tr>
                            <td><?php echo $products[$i]['pr_id']; ?></td>
                            <td><?php echo $products[$i]['pr_name']; ?></td>
                            <td><?php echo $products[$i]['pr_price']; ?></td>
                            <td><?php echo $products[$i]['pr_picture']; ?></td>
                            <td><?php echo $products[$i]['pr_stock']; ?></td>
                            <td style="display:flex; grid-column-gap: 0.8rem;margin-top:-1px">
                                <form action="update_product.php" method="POST">
                                    <input type="hidden" id="" value="<?php echo $products[$i]['pr_id']?>" name="product-id">
                                    <button type="submit" class="btn btn-md btn-success"><i class="fas fa-edit"></i></button>
                                </form>
                                <form action="../partials/_delete_product.php" method="POST">
                                    <input type="hidden" id="" value="<?php echo $products[$i]['pr_id']?>" name="product-id">
                                    <button type="submit" class="btn btn-md btn-danger"><i class="fas fa-trash"></i></button>
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
 
