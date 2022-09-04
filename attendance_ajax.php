<?php
    
    include_once("partials/database.php");

    session_start();
    if(isset($_POST['p_id']) && !empty($_POST['p_id'])){
        
        $role = $_SESSION['role'];
        $sql = "SELECT * FROM `role` WHERE id='$role';";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
    
        if($data['role'] == "student"){
            $id = $_POST['p_id'];
            $sql = "SELECT * FROM `student` WHERE id='$id';";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $date = date("Y-m-d");
            $name = $row['name'];
            $roll = $row['roll_no'];
            $course = $row['course'];
            $semester = $row['semester'];
            $branch = $row['branch'];
            $f_id = $row['f_id'];
            // insert
    
            $sql = "INSERT INTO `student` (`name`, `roll_no`, `course`, `semester`, `branch`, `attendance`, `f_id`, `time`) VALUES ('$name', '$roll', '$course', '$semester', '$branch', 'present', '$f_id', '$date');";
            $result = mysqli_query($conn,$sql);
            echo 1;
        }
    }

    if(isset($_POST['a_id']) && !empty($_POST['a_id'])){
        
        $role = $_SESSION['role'];
        $sql = "SELECT * FROM `role` WHERE id='$role';";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
    
        if($data['role'] == "student"){
            $id = $_POST['a_id'];
            $sql = "SELECT * FROM `student` WHERE id='$id';";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $date = date("Y-m-d");
            $name = $row['name'];
            $roll = $row['roll_no'];
            $course = $row['course'];
            $semester = $row['semester'];
            $branch = $row['branch'];
            $f_id = $row['f_id'];
            // insert
    
            $sql = "INSERT INTO `student` (`name`, `roll_no`, `course`, `semester`, `branch`, `attendance`, `f_id`, `time`) VALUES ('$name', '$roll', '$course', '$semester', '$branch', 'absent', '$f_id', '$date');";
            $result = mysqli_query($conn,$sql);
        }
    }


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