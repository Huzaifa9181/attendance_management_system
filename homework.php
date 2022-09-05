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
        include_once("partials/navbar.php");
        session_start();
        if(!isset($_SESSION['loggedin']) && empty($_SESSION['loggedin'])){
            header("Location: index.php"); 
        }
    ?>


<div class="container-fluid p-0 m-0">
        <div id="top-head" class="bg-primary p-0 m-0">
            <h1 class="text-white text-center p-3">Attendance Management System </h1>
        </div>
    </div>

    <?php
        if(isset($_GET['file']) && $_GET['file'] == "true"){
            echo'<div class="alert alert-success alert-dismissible fade show" style="margin-top:-9px !important;" role="alert">
            <strong>Successfully!</strong> Your homework is submitted. 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    ?>

    <h1 class="text-center mt-5 mb-5"> Homework</h1>
    <div class="container mt-3" style="margin-bottom: 200px !important;">
        
            <?php
                include_once("partials/database.php");

                $sql = "SELECT * FROM `homework`";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    while($data = mysqli_fetch_assoc($result)){
                        echo'
                        <h5>Time '.$data['time'].'</h5>
                            <div class="mt-4 p-5 mb-5 bg-primary text-white rounded">
                                <h2 class="">'.$data['title'].'</h2> 
                                <p>'.$data['description'].'</p> 
                            </div>
                            <h1 class="text-center mt-5 mb-5">Submit Your Homework</h1>
                            <form action="partials/handle_submit_homework.php" method="POST" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <input type="file" name="file" class="form-control" id="inputGroupFile02">
                                    <input type="hidden" name="hidden_id" class="form-control" value="'.$data['faculty'].'">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Homework</button>
                            </form>
                        ';
                    }
                }else{
                    echo "No Homework Today";
                }    
            ?>
            
            
    </div>

    <?php
        include "partials/footer.php";
    ?>

    
</div>
</body>
</html>