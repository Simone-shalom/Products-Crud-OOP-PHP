<?php 
// get db connection
require_once "../../database.php";


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