<?php
        include_once("database.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        session_start();
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $date = date("Y-m-d");
        $faculty = $_SESSION['f_id'];
        $sql = "INSERT INTO `homework` (`title`, `description`,`faculty`,`time`) VALUES ( '$title', '$desc','$faculty','$date');
        ";
        if($result = mysqli_query($conn,$sql)){
            header("Location: ../homework.php");
        };

    };
 
?> 