<?php
    
    include_once("partials/database.php");
    if(isset($_POST['p_id']) && !empty($_POST['p_id'])){
        $id = $_POST['p_id'];
        $sql = "UPDATE `student` SET `attendance` = 'present' WHERE `student`.`id` = '$id';";
        $result=mysqli_query($conn,$sql);
    }

    if(isset($_POST['a_id']) && !empty($_POST['a_id'])){
        $id = $_POST['a_id'];
        $sql = "UPDATE `student` SET `attendance` = 'absent' WHERE `student`.`id` = '$id';";
        $result = mysqli_query($conn,$sql);
    }

    
?>