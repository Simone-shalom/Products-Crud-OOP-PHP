<?php 
// db connection
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products-crud","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$productId = $_GET['id'];

// check if we have an id of product
if(!$productId){
  header('Location:index.php');
    exit;
}
//make sql query 
$statement = $pdo ->prepare('DELETE FROM productss WHERE id = :id');
$statement -> bindValue(':id', $productId);
$statement -> execute();

header('Location:index.php');


?>