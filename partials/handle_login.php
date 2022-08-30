<?php
        include_once("database.php");
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM `faculty` WHERE email = '$email';";

            $result = mysqli_query($conn,$sql);
            $row = mysqli_num_rows($result);
            if($row > 0){
                $data = mysqli_fetch_assoc($result);                
                if($password == $data['password']){
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['f_id'] = $data['id'];
                    $_SESSION['loggedin'] = "true";
                    header("Location: ../dashboard.php?login=true");
                }else{
                    header("Location: ../index.php?pass=false");
                }
            }else{
                header("Location: ../signup.php?login=false");
            }

        }else{
            echo "some tecnical issue";
        }  
?>