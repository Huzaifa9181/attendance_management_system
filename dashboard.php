<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - Attendance Management System</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <!-- jquey cdn -->
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>

    <style>
    p#pres {
        background-color: #198754;
        border-radius: 28px;
        width: 69px;
        padding: 7px;
        color: white;
    }

    #abs {
        background-color: #dc3545;
        border-radius: 28px;
        width: 69px;
        padding: 7px;
        color: white;
    }
    </style>

</head>

<body>
    <?php
        include_once("partials/database.php");
        session_start();
        include_once("partials/modal.php");
        include_once("partials/homework_modal.php");
        include_once("partials/navbar.php");

        $role = $_SESSION['role'];

        $sql = "SELECT * FROM `role` WHERE id='$role';";
        $result = mysqli_query($conn,$sql);
        $da = mysqli_fetch_assoc($result);

        if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])){
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM `users` WHERE email = '$email';";
    
            $result = mysqli_query($conn,$sql);
            $row = mysqli_num_rows($result);
            $data = mysqli_fetch_assoc($result);

        }else{
            header("Location: ../index.php");
        }
    ?>

    <div class="container-fluid p-0 m-0">
        <div id="top-head" class="bg-primary p-0 m-0">
            <h1 class="text-white text-center p-3">Attendance Management System </h1>
        </div>
    </div>

    <?php
        if(isset($_GET['not_equal']) && $_GET['not_equal'] == "false"){
        echo '<div class="alert alert-danger alert-dismissible fade show" style="margin-top: -8px;" role="alert">
            <strong>Error!</strong> You write wrong details of student please check properly.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if(isset($_GET['value']) && $_GET['value'] == "false"){
            echo '<div class="alert alert-danger alert-dismissible fade show" style="margin-top: -8px;" role="alert">
                <strong>Error!</strong> Write a proper value of <b> Student Name </b> and his <b>Roll No</b>.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
    ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-10">
                <h1 class="text-center">Welcome <?php echo $data['Username']; ?>!</h1>
            </div>
            <div class="col-md-2">
                <a href="partials/handle_logout.php?logout=true" class="btn btn-danger mt-2">LogOut</a>
            </div>
        </div>
        <hr class="mt-5 mb-5">

        <div class="row">
            <div class="col-md-10">
                <?php
                    if($da['role'] == "admin" || $da['role'] == "teacher"){
                        echo'<h1 class="text-center">Add Student for Mark Attendance</h1>';
                    }
                    
                ?>
            </div>

            <div class="col-md-2">
                <?php
                    if($da['role'] == "admin" || $da['role'] == "teacher"){
                        echo '<button data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success mt-2">Check
                        Records</button>
                        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#homeModal">Home Work</button> ';
                    }else{
                        echo '<a href="records.php" class="btn btn-success mt-2">Check
                        Records</a>';
                    }
                ?>
                                
            </div>

        </div>
    </div>

<?php

    if($da['role'] == "admin" || $da['role'] == "teacher"){
        echo'<div class="container mb-5">
        <form action="partials/handle_dashboard.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" required name="name" placeholder="Student Name">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" required name="roll_no" placeholder="Roll No">
            </div>
            <div class="mb-3">
                <select class="form-select" name="course" aria-label="Default select example">
                    <option selected>Course</option>
                    <option value="BS (Computer Sciences)">BS (Computer Sciences)</option>
                    <option value="BE Electrical">BE Electrical</option>
                    <option value="BE Electronics">BE Electronics</option>
                    <option value="BE Software Engineering.">BE Software Engineering.</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" name="semester" aria-label="Default select example">
                    <option selected>Semester</option>
                    <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>
                    <option value="3rd Semester">3rd Semester</option>
                    <option value="4th Semester">4th Semester</option>
                    <option value="5th Semester">5th Semester</option>
                    <option value="6th Semester">6th Semester</option>
                    <option value="7th Semester">7th Semester</option>
                    <option value="8th Semester">8th Semester</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" name="branch" aria-label="Default select example">
                    <option selected>Branch</option>
                    <option value="Main Campus - Defence view, Shaheed-e-Millat Road.">Main Campus - Defence view,
                        Shaheed-e-Millat Road.</option>
                    <option value="Gulshan Campus - Abid Town, Block-2, Gulshan-e-Iqbal.">Gulshan Campus - Abid Town,
                        Block-2, Gulshan-e-Iqbal.</option>
                    <option value="Gulshan Campus 2 - block 7.">Gulshan Campus 2 - block 7.</option>
                    <option value="Bahria Town Campus - Bahria town.">Bahria Town Campus - Bahria town.</option>
                    <option value="North Campus - Sector 7-B/1, North Karachi, opposite Muhammad Shah Graveyard.">North
                        Campus - Sector 7-B/1, North Karachi, opposite Muhammad Shah Graveyard.</option>
                    <option value="Malir Campus - Malir Halt, Airport road.">Malir Campus - Malir Halt, Airport road.
                    </option>
                </select>
            </div>
            <input type="submit" value="Add Student" class="btn btn-primary form-control">
        </form>
    </div>';
    }
?>
    

    <div class="container mb-5" style="margin-bottom: 120px !important;">

        <h2 class="text-center mb-5">Mark Attendance <?php echo date("Y-m-d");?></h2>

        <table class="table mb-5">
            <thead class="table-primary">
                <th>S.no</th>
                <th>Student Name</th>
                <th>Roll No</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Branch</th>
                <th>Attendance</th>
            </thead>
            <tbody>

                <?php

            // fetch all data 
        $f_id = $_SESSION['f_id'];
        $sql = "SELECT * FROM `student` WHERE f_id = '$f_id';";
        $result = mysqli_query($conn,$sql);
        $count = 1;
        if(mysqli_num_rows($result) > 0){
            while($data = mysqli_fetch_assoc($result)){
                if($data['time'] ==  date("Y-m-d")){
                    if($data["attendance"] == "present"){
                        echo '<tr><td>'.$count.'</td><td>'.$data['name'].'</td><td>'.$data['roll_no'].'</td><td>'.$data['course'].'</td><td>'.$data['semester'].'</td><td>'.$data['branch'].'</td><td><p id="pres">Present</p></td></tr>';
                        $count = $count +1;
                    }
                    elseif($data["attendance"] == "absent"){
                        echo '<tr><td>'.$count.'</td><td>'.$data['name'].'</td><td>'.$data['roll_no'].'</td><td>'.$data['course'].'</td><td>'.$data['semester'].'</td><td>'.$data['branch'].'</td><td><p id="abs">Absent</p></td></tr>';
                        $count = $count +1;

                    }else{
                    echo '<tr><td>'.$count.'</td><td>'.$data['name'].'</td><td>'.$data['roll_no'].'</td><td>'.$data['course'].'</td><td>'.$data['semester'].'</td><td>'.$data['branch'].'</td><td><button data-id="'.$data['id'].'" class="btn btn-success present" >P</button><button data-id="'.$data['id'].'" class="btn btn-danger mx-2 absent">A</button></td></tr>';
                    $count = $count +1;
                    }
                }
            }
        }

        $sql = "SELECT * FROM `users` WHERE email = '$email';";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        if($data['role'] == 3){
            $name = $data['name'];
            $sql="SELECT * FROM `student` WHERE name='$name';";
            $s_result = mysqli_query($conn,$sql);
            // $row = mysqli_fetch_assoc($s_result);
            if(mysqli_num_rows($s_result) > 0){
                while($data = mysqli_fetch_assoc($s_result)){
                    if($data['time'] == date("Y-m-d")){  
                        if($data["attendance"] == "present"){
                            echo '<tr><td>'.$count.'</td><td>'.$data['name'].'</td><td>'.$data['roll_no'].'</td><td>'.$data['course'].'</td><td>'.$data['semester'].'</td><td>'.$data['branch'].'</td><td><p id="pres">Present</p></td></tr>';
                            $count = $count +1;
                        }elseif($data["attendance"] == "absent"){
                            echo '<tr><td>'.$count.'</td><td>'.$data['name'].'</td><td>'.$data['roll_no'].'</td><td>'.$data['course'].'</td><td>'.$data['semester'].'</td><td>'.$data['branch'].'</td><td><p id="abs">Absent</p></td></tr>';
                            $count = $count +1;
    
                        }else{
                            echo "<tr><td>teacher not marks your attendance</td></tr>";
                        }
                    }
                }
            }
        }
        

    ?>
            </tbody>
        </table>
    </div>
    <script>
    $(document).ready(function() {
        $(".present").on("click", function(e) {

            var Id = $(this).data("id");
            console.log(Id);
            e.preventDefault();
            $(this).siblings().hide();
            $(this).html("Present");

            $.ajax({
                url: "attendance_ajax.php",
                type: "POST",
                data: {
                    p_id: Id
                },
                success: function(data) {
                    console.log(data);
                }

            })

        });

        $(".absent").on("click", function(e) {
            var a_Id = $(this).data("id");
            e.preventDefault();
            $(this).siblings().hide();
            $(this).html("Absent");

            $.ajax({
                url: "attendance_ajax.php",
                type: "POST",
                data: {
                    a_id: a_Id
                },
                success: function(data) {

                }

            })
        })
    })
    </script>


    <?php
        include "partials/footer.php";
    ?>
</body>

</html>