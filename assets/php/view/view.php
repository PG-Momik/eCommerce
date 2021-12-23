<?php
    if(!isset($_POST) OR empty($_POST)){
        echo "Cannot access this page.";
    }else{
?>

<?php include_once  '../partials/_configure.php';?>
<?php
if(!(isset($_POST))){
    header('location:../../../index.php');
}else{
    session_start();
    $sql_getProducts = 'SELECT * FROM tbl_products';
    $result = mysqli_query($conn, $sql_getProducts);
    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {
          $products[$i] = array(
            "pr_id" => $row['pr_id'],
            "pr_name" => $row['pr_name'],
            "pr_add_date" => $row['pr_add_date'],
            "pr_description" => $row['pr_description'],
            "pr_picture" => $row['pr_picture'],
            "pr_price" => $row['pr_price'],
            "pr_stock" => $row['pr_stock'],
            "pr_type" => $_POST['hidden-product-type'],

        );
        // $_SESSION['pl_name'][$_POST['hidden-product-index']];
          $i++;
        }
    $sql_getPack = 'SELECT pl_name, pl_discount, pl_delivery, pl_qty FROM tbl_price_plan WHERE pl_id ='.$_POST['hidden-product-id'];
    $resultPack =mysqli_query($conn, $sql_getPack);
    if (mysqli_num_rows($result) > 0) {
        $i = 0;
        while($row = mysqli_fetch_assoc($resultPack)) {
        $pack[$i] = array(
            'pl_name' =>$row['pl_name'],
            'pl_discount' =>$row['pl_discount'],
            'pl_delivery' =>$row['pl_delivery'],
            'pl_qty' =>$row['pl_qty'],
            
        );
        }
    }
    } 
    mysqli_close($conn);
    
}


?>

<?php include '../partials/_html_p1.php';?>
<?php 
    if(isset($_POST['order-now-btn'])){
        $Page_title = $_POST['hidden-product-type'];   
    }else{
        $Page_title = '';
    }
    echo '<title>'.$Page_title.'</title>';
?>
<?php include '../partials/_html_p2.php';?>
<?php include '../partials/_nav.php';?>

<hr>
<section id="product-display">
    <div class="row product-description-box">
    <?php foreach($products as $index => $product){ 
        if($product['pr_type']=='Regular' and $index == 2){
            break;
        }?>
            <div class="card product-description shadowed" style="width: 20rem;">
                <div class="card-header">
                    <h5 class="">
                        <?php 
                        echo $product['pr_type']." ".$product['pr_name'];?>
                    </h5>
                </div>
                <div class="row">
                <?php $path="../../images/product/";?>
                 <img class="card-img-top product-img col" src="<?php echo $path.$product['pr_picture']?>" alt="Card image cap">
                <div class="card-body col">
                    <h6 class="card-title">Rs.<?php 
                        $product['pr_price'] = $product['pr_price']-$pack[0]['pl_discount'];
                        echo $product['pr_price'];
                    ?> &nbsp;&nbsp;&nbsp; In-Stock: <?php echo $product['pr_stock'];?> </h5>
                    <p class="card-text"><?php echo $product['pr_description'];?></p>
                    <form action="../partials/_setCart_session.php" method="POST"> 
                        <input type="hidden" name="hidden-for-cart-id" id="hidden-product-id-for-cart" value="<?php echo $product['pr_id']?>">
                        <input type="hidden" name="hidden-for-cart-image" id="hidden-for-cart-image" value="<?php echo $product['pr_picture']?>">
                        <input type="hidden" name="hidden-for-cart-name" id="hidden-for-cart-name" value="<?php echo $product['pr_name'];?>">                        
                        <input type="hidden" name="hidden-for-cart-type" id="hidden-for-cart-type" value="<?php echo $product['pr_type'];?>"> 
                        <input type="hidden" name="hidden-for-cart-price" id="hidden-for-cart-price" value="<?php echo $product['pr_price'];?>">               
                        <input type="submit" name="add-to-cart-btn" class="btn btn-primary" value="Add to cart">
                    </form>
                </div>
                </div>
            </div>
        <?php }?>
    </div>

</div>
</section>
<hr>


    
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
<?php
    }
?>