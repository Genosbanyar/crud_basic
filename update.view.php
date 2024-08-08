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
                         <div class="card-title">Posts Edition</div>
                        </div>
                        <div class="col-md-6">
                         <a href="/" class="btn btn-secondary float-end"> << Back</a>
                        </div>
                    </div>
                </div>
                <?php 
                if(isset($_GET['post_id'])){
                    $post_id = $_GET['post_id'];
                    $statement = $pdo->prepare("SELECT * FROM test WHERE id=$post_id");
                    $statement->execute();
                    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach($posts as $row){
                    $title = $row['name'];
                    $description = $row['description'];
                    $post_id = $row['id'];
                    }
                }
                //Update
                $titleErr = '';
                $descErr = ''; 
                if(isset($_POST['update_post_button'])){
                    $post_title = $_POST['title'];
                    $post_desc = $_POST['des'];
                    $post_id = $_POST['post_id'];
                    if(empty($post_title)){
                        $titleErr = "The title field is required";
                    }
                    if(empty($post_desc)){
                        $descErr = "The description field is required";
                    }
                    if(!empty($post_title) && !empty($post_desc)){
                        $sql = "UPDATE test SET name=?,description=? WHERE id=$post_id";
                        $update = $pdo->prepare($sql);
                        $update->execute([$post_title,$post_desc]);
                        $_SESSION['successMsg'] = "A post updated successfully";
                        header("Location: /");
                    }
                    //UPDATE test SET name="$post_title",description="$post_desc WHERE id=$post_id"
                }
                ?>
                <form action = "" method = "POST">
                <div class="card-body">
                <input type="hidden" name="post_id" value=<?= $post_id?>>
                        <div class="mb-3">
                        <label for="">Title</label>
                        <input class="form-control <?php if($titleErr!=''):?> is-invalid<?php endif;?>" type="text" placeholder="Enter post title name" name="title" value=<?= $title;?>>
                        <span class = "text-danger">
                        <?php echo $titleErr;?>
                        </span>
                        </div>
                        <div class="mb-3">
                        <label for="">Description</label>
                        <textarea class = "form-control <?php if($descErr!=''):?> is-invalid<?php endif;?>" placeholder = "Description..." name="des"><?= $description;?></textarea>
                        <span class = "text-danger">
                        <?php echo $descErr;?>
                        </span>
                        </div>
                </div>
                <div class = "card-footer">
                    <button name="update_post_button" type="submit" class = "btn btn-primary" href="">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
   </div>
<?php require "footer.php"?>