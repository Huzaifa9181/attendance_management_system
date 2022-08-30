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

</head>

<body>
    <?php
        include_once("partials/database.php");
        session_start();

        if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])){
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM `faculty` WHERE email = '$email';";
    
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
                <h1 class="text-center">Add New Student</h1>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success mt-2">Check Records</button>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <form action="partials/handle_signup.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" required name="name" placeholder="Student Name">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" required name="roll_no" placeholder="Roll No">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" required name="course" placeholder="Course">
            </div>
            <div class="mb-3">
                <select class="form-select" name="semester" aria-label="Default select example">
                    <option selected>Semester</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" name="branch" aria-label="Default select example">
                    <option selected>Branch</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <input type="submit" value="Add Student" class="btn btn-primary form-control">
        </form>
    </div>

    <?php
        include "partials/footer.php";
    ?>
</body>

</html>