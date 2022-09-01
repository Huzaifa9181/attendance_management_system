<?php
        include_once("database.php");
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST['name'];
            $roll_no = $_POST['roll_no'];
            $course = $_POST['course'];
            $semester = $_POST['semester'];
            $branch = $_POST['branch'];
            $f_id = $_SESSION['f_id'];
            $date = date("Y-m-d");
            $sql = "INSERT INTO `student` (`name`, `roll_no`, `course`, `semester`, `branch`, `f_id`,`time`) VALUES ('$name', '$roll_no', '$course', '$semester', '$branch', '$f_id', '$date');";
            
            if($result = mysqli_query($conn,$sql)){
                header("Location: ../dashboard.php");
            }else{
                header("Location: ../signup.php?signup=false");
            }

        }else{
            echo "some tecnical issue";
        }  
?>