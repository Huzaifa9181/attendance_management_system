<?php
        include_once("database.php");
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $qualification = $_POST['qualification'];
            $username = $_POST['username'];
            $userid = $_POST['userid'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $sql = "SELECT * FROM `users` WHERE name='$name';";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_num_rows($result);
            if($row == 0){
                $sql = "INSERT INTO `users` (`name`, `email`, `qualification`, `Username`, `password`,`role`) VALUES ('$name', '$email', '$qualification', '$username', '$password' , '$role');";
                $result = mysqli_query($conn,$sql);
                header("Location: ../index.php?signup=true");
            }else{
                header("Location: ../signup.php?signup=false");
            }

        }else{
            echo "some tecnical issue";
        }  
?>