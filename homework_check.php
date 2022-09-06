<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>homework</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <!-- jquey cdn -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
</head>
<body>


    <?php
        include_once("partials/database.php");
        include_once("partials/navbar.php");
        
        if(!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin'])){
            header("Location: index.php"); 
        }
    ?>


<div class="container-fluid p-0 m-0">
        <div id="top-head" class="bg-primary p-0 m-0">
            <h1 class="text-white text-center p-3">Attendance Management System </h1>
        </div>
    </div>

    
    <h1 class="text-center mt-5 mb-5">Submitted Homework</h1>
    <div class="container mt-3" style="margin-bottom: 200px !important;">
        
            <?php

                $f_id = $_SESSION['f_id'];
                $sql = "SELECT * FROM `submit_homework` WHERE f_id='$f_id'";
                $result = mysqli_query($conn,$sql);
                echo'<table class="table">
                <thead class="table-dark">
                  <th>S.no</th>
                  <th>Student Name</th>
                  <th>faculty</th>
                  <th>Time</th>
                  <th>Homework</th>
                </thead>
                <tbody>';

        
                if($_SESSION['role'] == 1){
                    $a_sql = "SELECT * FROM `submit_homework`";
                    $a_result = mysqli_query($conn,$a_sql);
                    if(mysqli_num_rows($a_result) > 0){
                        $count =1;
                        while($data = mysqli_fetch_assoc($a_result)){
                            $id = $data['f_id'];
                            $path = $data['file_path'];
                            $sql = "SELECT * FROM `users` WHERE id='$id';";
                            $result = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($result)){
                                echo'
                                <tr>
                                    <td>'.$count.'</td>
                                    <td>'.$data['std_name'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$data['time'].'</td>
                                    <td><a href="partials/uploads/'.$path.'" target="_blank" class="btn btn-primary">Click Here</a></td>
                                </tr>
                                ';
                                $count = $count +1;
                            }
                        }
                    }else{
                        echo "<tr><td><b>Student donot submitted Homework</b></td></tr>";
                    }
                };

                if($_SESSION['role'] == 2 ){
                    if(mysqli_num_rows($result) > 0){
                        $count =1;
                        while($data = mysqli_fetch_assoc($result)){
                            $id = $data['f_id'];
                            $sql = "SELECT * FROM `users` WHERE id='$id';";
                            $result = mysqli_query($conn,$sql);
                            $path = $data['file_path'];
                            while($row = mysqli_fetch_assoc($result)){
                                echo'
                                <tr>
                                    <td>'.$count.'</td>
                                    <td>'.$data['std_name'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$data['time'].'</td>
                                    <td><a href="partials/uploads/'.$path.'" target="_blank" class="btn btn-primary">Click Here</a></td>
                                    
                                </tr>
                                ';
                                $count = $count +1;
                            }
                        }
                    }else{
                        echo "<tr><td><b>Student donot submitted Homework</b></td></tr>";
                    }    
                }
            ?>
            </tbody>
        </table>

    </div>



    <?php
        include "partials/footer.php";
    ?>

    
</div>
</body>
</html>