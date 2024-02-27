<?php 
// we are getitng the data from _GET _POST methods

// get db connection
require_once "database.php";
// get util randomString fn
require_once "utils/randomString.php";

$errors =[];
$title = $description = $img =$price =$date ='' ;



if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $title = $_POST['title'];
  $description = $_POST['desc'];
  // $img = $_POST['img'];
  $price = $_POST['price'];
  // date formated for mysql
  $date = date('Y-m-d H:i:s');

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
  $statement = $pdo->prepare("INSERT INTO productss (title, description, img, price, create_date) 
    VALUES(:title, :description, :img, :price, :date)");

  $statement->bindValue(':title', $title);
  $statement->bindValue(':description', $description);
  $statement->bindValue(':img', $imagePath);
  $statement->bindValue(':price', $price);
  $statement->bindValue(':date', $date);
  $statement-> execute();
  header('Location:index.php');
}
}

?>
<?php include_once "views/partials/header.php"?>
  <!-- get method, applies query filters, it is in the url -->
  <!-- for every other like db actions, user data use post-->
  <!-- to use file uploading we have to have entype set -->
  <?php include_once "views/products/form.php"?>
</body>
</html>