<?php include_once  '../partials/_configure.php';?>
<?php 
session_start();
$sql_getProducts = 'SELECT pr_name, pr_picture FROM tbl_products';
$result = mysqli_query($conn, $sql_getProducts);
if (mysqli_num_rows($result) > 0) {
    $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
        $products[$i] = array(
            "pr_name" =>$row['pr_name'],
            "pr_picture" => $row['pr_picture'],
        );
        $i++;
    }
}
?>
<?php include_once '../partials/_html_p1.php' ;?>
<title>Cart</title>
<?php include_once '../partials/_html_p2.php';?>
<section id="main">
    <?php include '../partials/_nav.php'?>
</section>
<section class="container-fluid" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.jpg');">
    <div id="cart-container">
    <table class="table bg-light">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = []; $i=0;?>
            <?php 
            if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $index => $item){?>
            <tr>
                <td>
                    <?php 
                        foreach($products as $index => $product){
                            if($product['pr_name']==$item['name']){
                                $path = "../../images/product/";
                                $source = $path.$product['pr_picture'];
                                ?>
                                <img src = "<?php echo $source?>"style="width:35px; height=30px; border:2px solid black">
                    <?php   }
                        }
                    ?>
                </td>
                <td><?php echo $item['name'];?></td>
                <td><?php echo $item['type'];?></td>
                <td><?php echo $item['price'];?></td>
                <?php
                    if($item['type'] == 'Regular'){
                        $qty = 1;
                    }elseif($item['type'] == 'Premium'){
                        $qty = 12;
                    }else{
                        $qty = 50;
                    }                
                ?>
                <td><?php echo $qty?></td>
                <?php $total[$i] = $item['price']*$qty?>
                <td><?php echo $total[$i]?></td>
                <td>
                    <form action="../partials/_cartSessionAction.php" method="POST">
                        <input type="hidden" name="hidden-cart-row-value" id="" value="<?php echo $i;?>">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php $i++;
             }
            }
            #end of loop
            ?>
             <?php           
             ?>
            <tr>
                <td></td>
                <td colspan="4">Total</td>
                <?php ?>
                <td>
                    <?php 
                    $total_dheba = 0;
                    if(isset($_SESSION['cart'])){
                        $size = sizeof($_SESSION['cart']);
                        for($i = 0; $i<$size; $i++){
                            $total_dheba = $total[$i] + $total_dheba;
                        }
                        echo $total_dheba;
                    }

                    ?>
                </td>
                <td>
                    <form action="../partials/_checkout.php" method="POST">
                        <a href="checkout"><button class="btn btn-sm btn-warning">Checkout</button></a>
                    </form>
                </td>

            </tr>

        </tbody>
    </table>
    </div>

</section>

<?php include_once '../partials/_footer.php';?>