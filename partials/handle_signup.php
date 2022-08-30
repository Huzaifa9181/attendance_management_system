<?php
        include_once("database.php");
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $qualification = $_POST['qualification'];
            $username = $_POST['username'];
            $userid = $_POST['userid'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `faculty` WHERE email = '$email';";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_num_rows($result);
            if($row == 0){
                $sql = "INSERT INTO `faculty` (`name`, `email`, `qualification`, `Username`, `user_id`, `password`) VALUES ('$name', '$email', '$qualification', '$username', '$userid', '$password');";
                $result = mysqli_query($conn,$sql);
                echo "You data insert";
                header("Location: ../index.php?signup=true");
            }else{
                
                header("Location: ../signup.php?signup=false");

            }

        }else{
            echo "some tecnical issue";
        }  
?>