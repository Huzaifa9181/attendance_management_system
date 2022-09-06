
<?php
    include "database.php";
    $role = $_SESSION['role'];
    $r_sql = "SELECT * FROM `role` WHERE id='$role';";
    $r_result = mysqli_query($conn,$r_sql);
    $role_fet = mysqli_fetch_assoc($r_result);
    
    if($role_fet['role'] == "admin" ||$role_fet['role'] == "teacher"){
        echo'
        <div class="modal fade" id="homeModal" tabindex="-1" aria-labelledby="homeModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="homeModalLabel">home work</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="partials/handle_homework.php" method="POST">
                            <div class="mb-3">
                                <label for="title" class="form-label">Homework Title</label>
                                <input type="text" class="form-control" maxlength="80" name="title" id="title">
                                
                            </div>
                            <div class="mb-3">
                                <label for="floatingTextarea" class="mb-2">Homework Description</label>
                                <textarea class="form-control" name="desc" id="floatingTextarea"></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>';
    }
?>
