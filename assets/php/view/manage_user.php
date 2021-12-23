<?php
include_once '_sessionstart.php';
include_once '_config.php';
?>
<?php
                        $sql='SELECT * FROM tbl_user';
  
                        //Fetching result from database
                        $result = mysqli_query($conn, $sql);
                        
                        //Checking if there is data saved in the students table.
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $i = 0;
                            // Looping through the results
                            while($row = mysqli_fetch_assoc($result)) {
                              $user[$i] = array(
                                "u_id" => $row['u_id'],
                                "u_name" => $row['u_name'],
                                "u_address" => $row['u_address'],
                                "u_email" => $row['u_email'],
                                "u_type" => $row['u_type'],

                                
                              );
                              $i++;
                            }
                        } 
                      
                        //connection close
                        mysqli_close($conn);
                      
                        
                        ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Products</title>
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
<script src="https://kit.fontawesome.com/d03c35338f.js" crossorigin="anonymous"></script>
</head>
<body>
    
<div class="header">
	<div class="container">
	<?php include_once '_nav.php'; ?>
	</div>
	</div>

    <!-- sidebar -->
    <div class="admin-batta">
        <?php include_once '_sidenav.php';?>
        <div class="admin-batta-right">
            <table class="admin-batta-right-table">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Address</td>
                        <td>Email</td>
                        <td>Type</td>
                    </tr>
                    
                        <?php $size= sizeof($user); ?>
                    <?php for($j=0;$j<$size;$j++){?>
                        <tr>
                            <td><?php echo $j+1; ?></td>
                            <td><?php echo $user[$j]['u_name']; ?></td>
                            <td><?php echo $user[$j]['u_address']; ?></td>
                            <td><?php echo $user[$j]['u_email']; ?></td>

                            <td>
                                <?php
                                if($user[$j]['u_type']  > 0){
                                    echo 'Admin';
                                    }else{
                                        echo 'Customer';
                                    }
                                ?>
                            </td>
                        </tr>

                        <?php } ?>
                    
                </thead>
            </table>
        </div>
</div>
<?php
include_once '_footer.php';
?>
