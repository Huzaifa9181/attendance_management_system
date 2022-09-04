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
    ?>
    
    <div class="container-fluid p-0 m-0">
        <div id="top-head" class="bg-primary p-0 m-0">
            <h1 class="text-white text-center p-3">Attendance Management System</h1>
        </div>
    </div>
    <?php
        if(isset($_GET['signup']) && $_GET['signup'] == "false"){
            echo '<div style="margin-top: -8px;" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> User is already exsist.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
        }
    ?>


    <div class="container mb-5">
        <h1 class="text-center p-3">Registration Form</h1>
        <form action="partials/handle_signup.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" required name="name" placeholder="Full Name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" required name="email" placeholder="Someone@gmail.com">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Qualification</label>
                <input type="text" class="form-control" required name="qualification" placeholder="Qualification">
            </div>   
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" required name="username" placeholder="Username">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" required name="password">
            </div>
            <select class="form-select mb-3" name="role"  aria-label="Default select example">
            <option selected>Role</option>
                <option value="2">Teacher</option>
                <option value="3">Student</option>
            </select>
            <input type="submit" class="btn btn-primary form-control">
        </form>
        <a href="index.php" class="btn btn-success mt-4">Back</a>
    </div> 

    <?php
        include "partials/footer.php";
    ?>
</body>
</html>