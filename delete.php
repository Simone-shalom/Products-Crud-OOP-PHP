<?php 
// db connection
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products-crud","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$productId = $_GET['id'];


if($productId){

//make sql query 
$statement = $pdo ->prepare('DELETE FROM products WHERE id = :id');
$statement -> bindValue(':id', $productId);
$statement -> execute();

header('Location:index.php');

} else {
    header('Location:index.php');
    exit;
}


?>