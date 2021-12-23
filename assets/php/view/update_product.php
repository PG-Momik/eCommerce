<?php
    if(isset($_POST['product-id'])){
        $id = $_POST['product-id'];
?>
<?php include_once '../partials/_configure.php';?>
<?php 
    $sql='SELECT pr_id, pr_name, pr_price, pr_picture, pr_description, pr_stock FROM tbl_products';
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
                "pr_description" => $row['pr_description'],
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
            <form action="../partials/_update_product.php" method="POST" class="bordered admin-batta-right" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="user-id" class="col-sm-3 col-form-label">ID:</label>
                    <div class="col-sm-9">
                        <input type="text" name="pr-id" readonly class="form-control" id="product-id" value="<?php echo $products[0]['pr_id']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product-name" class="col-sm-3 col-form-label">Name:</label>
                    <div class="col-sm-9">
                        <input type="text" name="new-name" class="form-control" id="product-name" value="<?php echo $products[0]['pr_name']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product-price" class="col-sm-3 col-form-label">Price:</label>
                    <div class="col-sm-9">
                        <input type="text" name="new-price" class="form-control" id="product-price" value="<?php echo $products[0]['pr_price']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product-stock" class="col-sm-3 col-form-label">Stock:</label>
                    <div class="col-sm-9">
                        <input type="text" name="new-stock" class="form-control" id="product-stock" value="<?php echo $products[0]['pr_stock']?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product-picture" class="col-sm-3 col-form-label">Image:</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="product-picture" name="new-picture">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product-description" class="col-sm-3 col-form-label">Description:</label>
                    <div class="col-sm-9">
                        <textarea id="product-description" cols="30" rows="4" name="new-description"><?php echo $products[0]['pr_description']?></textarea>
                </div>
                </div>
                <div class="form-group row" style="text-align: right">
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
    echo "Cannot access this page";
}

?>