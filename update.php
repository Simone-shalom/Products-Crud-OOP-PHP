<?php 

echo 'update Product';

$productId = $_GET['id'];
// check if we have an id of product
if(!$productId){
  header('Location:index.php');
    exit;
}

//setup connection to db with pdo
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products-crud","root","");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//select the data
$statement = $pdo-> prepare('SELECT * from products  WHERE id = :id ORDER BY create_date DESC');
$statement -> bindValue(":id", $productId);
$statement ->execute();
$product = $statement-> fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Important link to bootstrap to be able to add boottrasp elements  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel='stylesheet' href='app.css'>
    <title>Products Crud</title>
  </head>
  <body>
    <h1>Products Crud!</h1>
    <div>
        <a href="create.php" type="button" class="btn btn-primary">Create a Product</a>
    </div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Created Date</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody class="table-group-divider">
    <!-- correct way to map data in php- remmeber -->
   <?php echo $product['title']?>
  </tbody>
</table>
  </body>
</html>