<?php
        include_once("database.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $name = $_SESSION['name'];   
        $date = date("Y-m-d");
        $img = $_FILES['file'];
        $f_id = $_POST['hidden_id'];

        $file_name = $_FILES['file']['name'];
        $file_path = $_FILES['file']['full_path'];
        $file_type =  $_FILES['file']['type'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_error = $_FILES['file']['error'];
        $file_size = $_FILES['file']['size'];
      


        if(move_uploaded_file($file_tmp,"uploads/".$file_name)){
            $sql = "INSERT INTO `submit_homework` (`file_path`, `f_id`, `std_name`, `time`) VALUES ('$file_name', '$f_id', '$name', '$date');";
            $result = mysqli_query($conn,$sql);
            header("location: ../homework.php?file=true");
        }else{
            echo"error";
        }
    };
 
?> 