<?php
require "header.php";
require "connect.php";
?>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                     <div class="card-title">Posts Creation</div>
                    </div>
                    <div class="col-md-6">
                     <a href="/" class="btn btn-secondary float-end"> << Back</a>
                    </div>
                </div>
            </div>
            <form action = "add.view.php" method = "POST">
            <div class="card-body">
                    <div class="mb-3">
                    <label for="">Title</label>
                    <input class="form-control" type="text" placeholder="Enter post title name" name="title">
                    </div>
                    <div class="mb-3">
                    <label for="">Description</label>
                    <textarea class = "form-control" placeholder = "Description..." name="des"></textarea>
                    </div>
            </div>
            <div class = "card-footer">
                <button name="create_post_button" type="submit" class = "btn btn-primary" href="">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php require "footer.php"?>