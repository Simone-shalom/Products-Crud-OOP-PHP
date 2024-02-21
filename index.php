<?php


$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products-crud","root","");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$statement = $pdo-> prepare('SELECT * from products ORDER BY create_date DESC');
$statement ->execute();
$products = $statement-> fetchAll(PDO::FETCH_ASSOC);

print_r($products);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel='stylesheet' href='app.css'>
    <title>Products Crud</title>
  </head>
  <body>
    <h1>Products Crud!</h1>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Created Date</th>
      <th scope="col">Action</th>


    </tr>
  </thead>
  <tbody class="table-group-divider">
   <?php  foreach($products as $indx => $product) {?>
     <tr>
      <th scope="row"><?php echo $indx +1 ?></th>
        <td><?php echo $product['title'] ?></td>
        <td><?php echo $product['price'] ?></td>
        <td><?php echo $product['create_date'] ?></td>
        <td>
        <button type="button" class="btn btn-info">Edit</button>
        <button type="button" class="btn btn-danger">Delete</button>
        </td>


    </tr>
    <?php } ?>
 
   
  </tbody>
</table>
  </body>
</html>