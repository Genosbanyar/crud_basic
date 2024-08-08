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
                            <div class="card-title">Posts List</div>
                        </div>
                        <div class="col-md-6">
                            <a class = "btn btn-primary float-end" href="create.view.php">+ Add new</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <?php if(isset($_SESSION["successMsg"])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION["successMsg"]; 
                    unset($_SESSION["successMsg"]);
                    ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <?php endif; ?>
                    <?php  
                    if(isset($_GET["post_id_delete"])){
                    $delete_post = $_GET["post_id_delete"];
                    //DELETE FROM test WHERE id=$_GET['post_id_delete'];
                    $delete = $pdo->prepare("DELETE FROM test WHERE id=$delete_post");
                    $delete->execute();
                    $_SESSION["successMsg"] = "A post deleted successfully";
                    header("Location: /");
                    }
                    ?>
                    <table class = "table table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($datas as $data):?>
                            <tr>
                                <td><?= $data['id']?></td>
                                <td><?= $data['name'] ?></td>
                                <td><?= $data['description']?></td>
                                <td><a href="update.view.php?post_id=<?= $data['id']?>">Edit</a> |
                                    <a href="index.php?post_id_delete=<?= $data['id']?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php"?>