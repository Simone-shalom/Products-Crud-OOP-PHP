<?php 
// db connection
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$productId = $_GET['id'];


if($productId){

} else {
    header('Location:index.php');
    exit;
}

$statement = $pdo ->prepare('DELETE FROM products WHERE id = :id');
$statement -> bindValue(':id', $productId);
$statement -> execute();

header('Location:index.php');

?>