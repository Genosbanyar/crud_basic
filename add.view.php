<?php
require "header.php";
require "connect.php";
//$_SESSION["successMsg"] = "";
$titleErr = '';
$descErr = '';

if(isset($_POST['create_post_button'])){
    if(empty($_POST['title'])){
        $titleErr = 'The title field is required';
    }
    if(empty($_POST['des'])){
        $descErr = 'The description field is required';
    }
    if(!empty($_POST['title']) && !empty($_POST['des'])){
        $sql = "INSERT INTO test (name,description) VALUES (?,?)";
        $insert = $pdo->prepare($sql);
        $insert->execute([$_POST['title'],$_POST['des']]);
        $_SESSION["successMsg"] = "A post created successfully";
        return header("Location: /");
    }

};
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
                        <input class="form-control <?php if($titleErr!=''):?> is-invalid<?php endif;?>" type="text" placeholder="Enter post title name" name="title" value=<?= $_POST['title']?>>
                        <span class = "text-danger">
                        <?php echo $titleErr;?>
                        </span>
                        </div>
                        <div class="mb-3">
                        <label for="">Description</label>
                        <textarea class = "form-control <?php if($descErr!=''):?> is-invalid<?php endif;?>" placeholder = "Description..." name="des"><?= $_POST['des']?></textarea>
                        <span class = "text-danger">
                        <?php echo $descErr;?>
                        </span>
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