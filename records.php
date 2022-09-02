<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Result</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <!-- jquey cdn -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <style>
        .table-cont{
            margin-bottom: 447px;
        }
    </style>
</head>

<body>



    <div class="container-fluid p-0 m-0">
        <div id="top-head" class="bg-primary p-0 m-0">
            <h1 class="text-white text-center p-3">Attendance Management System </h1>
        </div>
    </div>

    <div class="container table-cont mt-5">
    <a href="dashboard.php" class="btn btn-primary mb-3">Back to Dashboard</a>
    <table class="table table-striped table-hover">
            <thead class="table-dark">
                <th>S.no</th>
                <th>Student Name</th>
                <th>Roll No</th>
                <th>Course</th>
                <th>Date</th>
                <th>Attendance</th>
            </thead>
            <tbody>

                <?php

include "partials/database.php";
    if(isset($_POST['s_name']) && !empty($_POST['roll_no'])){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $name = $_POST['s_name'];
            $roll_no = $_POST['roll_no'];

            $sql = "SELECT * FROM `student` WHERE name='$name' AND roll_no='$roll_no';";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            if($name == $row['name'] && $roll_no == $row['roll_no']){
                $sql = "SELECT * FROM `student` WHERE name='$name' AND roll_no='$roll_no';";
                $result = mysqli_query($conn,$sql);
                $count = 1;
                if(mysqli_num_rows($result) > 0 ){
                    while($data = mysqli_fetch_assoc($result)){
                    echo'
                    <tr>
                    <td>'.$count.'</td>
                    <td>'.$data['name'].'</td>
                    <td>'.$data['roll_no'].'</td>
                    <td>'.$data['course'].'</td>
                    <td>'.$data['time'].'</td>';
                    if($data['attendance'] == "present"){
                        echo '<td class="text-primary text-capitalize"><b>'.$data['attendance'].'</b></td>';
                    }else{
                        echo '<td class="text-danger text-capitalize" ><b>'.$data['attendance'].'</b></td>';
                    }
                    echo' </tr>';
                    
                    $count = $count +1;
                    }
                }
            }else{
                header("Location: dashboard.php?not_equal=false");
            }
            
        }
    }else{
        header("Location: dashboard.php?value=false");
    }
?>
            </tbody>
        </table>
    </div>


    <?php include "partials/footer.php";?>

</body>

</html>