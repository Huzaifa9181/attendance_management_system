<?php
        include_once("database.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $date = date("Y-m-d");
        $sql = "INSERT INTO `homework` (`title`, `description`,`time`) VALUES ( '$title', '$desc','$date');
        ";
        if($result = mysqli_query($conn,$sql)){
            header("Location: ../homework.php");
        };

    };
 
?> 