<?php 

$productId = $_GET['id'];
// check if we have an id of product
if(!$productId){
  header('Location:index.php');
    exit;
}

// get db connection
require_once "database.php";

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

  $title = $_POST['title'];
  $description = $_POST['desc'];
  // $img = $_POST['img'];
  $price = $_POST['price'];
  // date formated for mysql

  // form validation
  if(!$title){
    $errors[] = 'Product ttile is required';
  }
   if(!$price){
    $errors[] = 'Product price is required';
  }
   if(!$description){
    $errors[] = 'Product desc is required';
  }

// handling image uploads to images folder with random name to avoid same names
    $img = $_FILES['img'] ?? null;
    $imagePath = '';

    if($img && $img['tmp_name']){
        $imagePath = 'images/' . randomString(8) . '/' . $img['name'];
      mkdir(dirname($imagePath));
      print_r($img);
      move_uploaded_file($img['tmp_name'], $imagePath);
    }

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
function randomString($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $str .= $characters[$index];
    }

    return $str;
}
?>

<?php include_once "views/partials/header.php"?>

  <!-- get method, applies query filters, it is in the url -->
  <!-- for every other like db actions, user data use post-->
  <!-- to use file uploading we have to have entype set -->
  <?php include_once "views/products/form.php"?>
</body>
</html>