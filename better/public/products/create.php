<?php 
// we are getitng the data from _GET _POST methods

// get db connection
require_once "../../database.php";
// get util randomString fn
require_once "../../utils/randomString.php";

$errors =[];
$title = $description = $img =$price =$date ='' ;



if($_SERVER['REQUEST_METHOD'] === 'POST'){
  // take validateProduct from utils
  require_once "../../utils/validateProduct.php";

  // add data to db only if there is no errors   
if(empty($errors)){
    //add data to db
  $statement = $pdo->prepare("INSERT INTO productss (title, description, img, price, create_date) 
    VALUES(:title, :description, :img, :price, :date)");

  $statement->bindValue(':title', $title);
  $statement->bindValue(':description', $description);
  $statement->bindValue(':img', $imagePath);
  $statement->bindValue(':price', $price);
  $statement->bindValue(':date', date('Y-m-d H:i:s'));
  $statement-> execute();
  header('Location:index.php');
}
}

?>
<?php include_once "../../views/partials/header.php"?>

<?php include_once "../../views/products/form.php"?>
</body>
</html>