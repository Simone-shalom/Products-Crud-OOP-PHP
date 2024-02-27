<?php 

$productId = $_GET['id'];
// check if we have an id of product
if(!$productId){
  header('Location:index.php');
    exit;
}

// get db connection
require_once "database.php";
// get util randomString fn
require_once "utils/randomString.php";

$statement = $pdo -> prepare("SELECT * from productss WHERE id =:id");
$statement ->bindValue(":id", $productId);
$statement -> execute();
$product = $statement -> fetch(PDO::FETCH_ASSOC);

$errors =[];
$title = $product['title'];
$description= $product['description'];
$img =$product['img'];
$price =$product['price'];
$date =$product['create_date'] ;



if($_SERVER['REQUEST_METHOD'] === 'POST'){
  // take validateProduct from utils
require_once "utils/validateProduct.php";


  // add data to db only if there is no errors   
if(empty($errors)){
    //add data to db
  $statement = $pdo->prepare("UPDATE productss
    SET title =:title, description =:description, img =:img, price =:price WHERE id=:id");

  $statement->bindValue(':title', $title);
  $statement->bindValue(':description', $description);
  $statement->bindValue(':img', $imagePath);
  $statement->bindValue(':price', $price);
  $statement->bindValue(':id', $productId);
  $statement-> execute();
  header('Location:index.php');
}
}
?>

<?php include_once "views/partials/header.php"?>

<?php include_once "views/products/form.php"?>
</body>
</html>