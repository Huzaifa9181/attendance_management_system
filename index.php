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
        .log-in-box.bg-primary {
            background-color: #005b95 !important;
            padding: 30px;
        }
        .login.bg-light {
            padding: 27px;
        }

        .sub-btn {
            width: 191px!important;
            border-radius: 0px;
        };

    </style>
</head>

<body>
    <?php
        include_once("partials/database.php");
    ?>
    <div class="container-fluid p-0 m-0" >
        <div id="top-head" class="bg-primary p-0 m-0">
            <h1 class="text-white text-center p-3">Attendance Management System</h1>
        </div>
    </div>

    <?php
        session_start();
        if(isset($_GET['login']) && $_GET['login'] == "true"){
            $email = $_SESSION['email'];
            echo '<div style="margin-top: -8px;" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Successfully!</strong> You are logged in '.$email.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
        }
        if(isset($_GET['pass']) && $_GET['pass'] == "false"){
            $email = $_SESSION['email'];
            echo '<div style="margin-top: -8px;" class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Please write the correct password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
        }
    ?>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-5">
                <img src="logo.png" width="260px" ; alt="">
            </div>
            <div class="col-md-7">
                <h1>Iqra University Computer Science </h1>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-5" style="margin-bottom: 153px !important; margin-top: 93px !important;">
        <div class="row">
            <div class="col-md-6">
                <img src="campus.png" height="322px" width="460px" ; alt="">
            </div>
            <div class="col-md-6 text-center">
                <div class="log-in-box bg-primary">
                    <div class="login bg-light">
                        <form action="partials/handle_login.php" method="post">
                            <input type="email" name="email" id="email"><br><br>
                            <input type="password" name="password" id="password"><br><br>
                            <input type="submit" class="btn btn-primary sub-btn"><br><br>
                            <span style="display: flex;" class="mx-5"><p class="para">Not registered?</p><a class="text-decoration-none" href="signup.php">Create an account</a></span>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
        include "partials/footer.php";
    ?>

</body>

</html>