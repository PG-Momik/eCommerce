<?php
if(isset($_POST['testimonial-btn'])){
    $file = $_FILES['img'];
    $fileName = $_FILES['img']['name'];
    $fileTmp = $_FILES['img']['tmp_name'];
    $fileSize = $_FILES['img']['size'];
    $fileError =$_FILES['img']['error'];
    $fileType = $_FILES['img']['type'];


    $fileExt = explode('.', $fileName);
    $fileActualExt  = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png');



    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 200000){
                include_once '_configure.php';
                if(!isset($_SESSION)){
                    session_start();
                }


                $sql_getUser = "SELECT u_name FROM tbl_user where u_id = '".$_SESSION['id']."'";
                $result = mysqli_query($conn, $sql_getUser);
                if (mysqli_num_rows($result) > 0) {
                    $i = 0;
                    while($row = mysqli_fetch_assoc($result)) {
                        $datas[$i] = array(
                            "user" => $row['u_name'],
                        );
                        $i++;
                    }
                }

                $fileNewName = $_SESSION['id'].$datas[0]['user'].".".$fileActualExt;
                $fileDestination  = '../../images/testimonial/uploads/'.$fileNewName;
                move_uploaded_file($fileTmp, $fileDestination);


                $date = date("Y-m-d");
                $description  = $_POST['textarea'];
                $id = $_SESSION['id'];
                $filter = $_POST['filter'];
                $sql_upload = "INSERT INTO tbl_testimonial (t_image, t_description, t_date, u_id, t_filter)
                VALUES ('$fileDestination', '$description', '$date', '$id', '$filter')";
                if(mysqli_query($conn, $sql_upload)){
                    header('Location: ../view/user_testimonial.php');
                }else{
                    echo "Something went wrong. Try again.";
                }
            }else{
                echo "File too big.";
            }
        }else{
            echo "There was an error uploading.";
        }
    }
    else{
        echo "You cannot upload file of this type.";
    }
}

?>