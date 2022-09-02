<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Check Records Of Students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="records.php" method="POST">
                    <div class="mb-3">
                        <label for="s_name" class="form-label">Student Name</label>
                        <input type="text" class="form-control" name="s_name" id="s_name">
                    </div>
                    <div class="mb-3">
                        <label for="roll_no" class="form-label">Roll No</label>
                        <input type="number" class="form-control" name="roll_no" id="roll_no">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Check</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                
            </div>
        </div>
    </div>
</div>