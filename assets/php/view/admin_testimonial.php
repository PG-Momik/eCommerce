<?php include_once '../partials/_configure.php';?>
<?php
$sql='SELECT tbl_testimonial.t_id, tbl_testimonial.t_image,
             tbl_testimonial.t_description,
             tbl_testimonial.t_image, tbl_testimonial.t_filter,
             tbl_testimonial.t_date,
             tbl_user.u_email 
             FROM tbl_testimonial
             JOIN tbl_user on tbl_testimonial.u_id = tbl_user.u_id
             ORDER BY tbl_testimonial.t_date DESC';
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $i=0;
    while($row = mysqli_fetch_assoc($result)) {
        $testimonials[$i] = array(
            "t_id" => $row['t_id'],
            "t_image" => $row['t_image'],
            "t_description" => $row['t_description'],
            "t_filter" => $row['t_filter'],
            "t_date" => $row['t_date'],
            "u_email" => $row['u_email'],
        
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
            <h1 class="admin-header">Testimonials</h1>
                <table class="admin-batta-right table table-dark">
                    <thead>
                        <tr>
                            <td><b>SN.</b></td>
                            <td><b>T-id</b></td>
                            <td><b>User Img</b></td>
                            <td><b>Description</b></td>
                            <td><b>Email</b></td>
                            <td><b>Flag</b></td>
                            <td><b>Action</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $size= sizeof($testimonials); ?>
                        <?php for($j=0;$j<$size;$j++){?>
                        <tr>
                            <td><?php echo $j+1; ?></td>
                            <td><?php echo $testimonials[$j]['t_id'];?></td>
                                <?php $path = "../../images/testimonial/uploads/";?>
                            <td><img src = "<?php echo $path.$testimonials[$j]['t_image'];?> "style="width:35px; height=35px;"></td>
                            <td>
                                <textarea name="" id="" cols="20" rows="1" readonly><?php echo $testimonials[$j]['t_description']?></textarea>
                            </td>
                            <td><?php echo $testimonials[$j]['u_email']; ?></td>
                            <td><?php echo $testimonials[$j]['t_filter']; ?></td>
                            <td style="display:flex; grid-column-gap:1rem">
                                <form action="_update_order.php" method="POST">
                                    <input type="hidden" value="<?php echo $order[$j]['o_id'];?>" name="o-id" readonly>    
                                    <input type="submit" name="u-btn" value="Dissaprove" class="btn btn-sm btn-danger">
                                </form>
                                <form action="_update_order.php" method="POST">
                                    <input type="hidden" value="<?php echo $order[$j]['o_id'];?>" name="o-id" readonly> 
                                    <input type="submit"  name="s-btn" value="Approve" class="btn btn-sm btn-primary">
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

