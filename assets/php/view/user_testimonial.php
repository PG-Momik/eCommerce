<?php include '../partials/_account_opening.php';?>
<?php 
if(!isset($_SESSION)){
    session_start();
}

$sql_getTest = "SELECT * FROM tbl_testimonial where u_id = '".$_SESSION['id']."'";
$check_test = mysqli_query($conn, $sql_getTest);
?>
<div class="user-batta">
<table class="table bg-light shadow">
    <h1>Testimonial</h1>
    <div class="testimonial-form bordered bg-light p-4">
        <?php if (mysqli_num_rows($check_test) > 0) { 
            $row = mysqli_fetch_assoc($check_test);
            $success = "Thank you for your Testimonial.";
        ?>
        <div class="testimonial-profile">
            <img src="<?=$row['t_image']?>" class="testimonial-image" >
        </div>
        <h2 class='alert alert-success'><?php echo $success?></h2>
        <div class="acc-testimonial-content">
           <h3>"<?php echo $row['t_description']?>"</h3>
           <h4>-<?php echo $row['t_date']?></h4> 
        </div>
        <?php }else{?>
        <form action="../partials/_upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                    <input type="file" id="photo" class="form-control input-field" name="img" required>
                <label for="photo">Your Photo</label>
            </div>
            <div class="form-group">
                <textarea id="textarea" class="form-control input-field" name="textarea" placeholder="Enter your testimonial." rows="5" required></textarea>
                <label for="textarea">Your Testimonial</label>
            </div>
            <input type="hidden" name="filter" value="2">
            <div class="form-group" style="text-align:center">
                <input type="submit" id="testimonial-btn" value ="Submit" class="btn btn-primary" name="testimonial-btn">
            </div>
        </form>
        <?php }?>
    </div>
</table>
        </div>
<?php include '../partials/_account_closure.php';?>
<?php include '../partials/_footer.php';?>