<?php
try{
    $pdo = new PDO("mysql:host=localhost;dbname=post", "root");
}catch (PDOException $err){
    echo $err->getMessage();
}
$statement = $pdo->prepare("SELECT * FROM test");
$statement->execute();
$datas = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
