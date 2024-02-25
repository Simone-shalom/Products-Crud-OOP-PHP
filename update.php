<?php 

$productId = $_GET['id'];
// check if we have an id of product
if(!$productId){
  header('Location:index.php');
    exit;
}

//setup connection to db with pdo
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products-crud","root","");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel='stylesheet' href='app.css'>
    <title>Document</title>
</head>
<body>
  <!-- get method, applies query filters, it is in the url -->
  <!-- for every other like db actions, user data use post-->
  <!-- to use file uploading we have to have entype set -->
<form action='' method="post" enctype="multipart/form-data">
  <h1>Update a Product</h1>
<?php if(!empty($errors)):  ?>
  <div class="alert alert-danger">
   <?php  foreach($errors as $error) {?>
    <div><?php echo $error?></div>
   <?php  } ?>
  </div>
<?php endif; ?>
  
  <div class="mb-3">
    <label for="prd" class="form-label">Product Title</label>
    <input type="text" class="form-control" id="prd" name="title" value="<?php echo $title ?>">
    <div id="prd" class="form-text">Add name to a new product</div>
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Description</label>
    <input type="text" class="form-control" id="desc" name="desc" value="<?php echo $description ?>">
  </div>
  <div class="mb-3">
    <label for="img" class="form-label">Image</label>
    <input type='file' class="form-control" id="img" name="img" >
  </div>
   <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" step="0.1" class="form-control" id="price" name="price" value="<?php echo $price ?>">
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
</body>
</html>