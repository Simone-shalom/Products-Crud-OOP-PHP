<?php

// 4:02 but add images part 
// start refactoring
//setup connection to db with pdo
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products-crud","root","");

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//select the data
// select filtered data by search query

$search = $_GET['search'] ?? '';

if($search){
  $statement =$pdo -> prepare('SELECT * from productss WHERE title LIKE :title  ORDER BY create_date DESC');
  $statement -> bindValue(':title','%'.$search.'%');
}else {
$statement = $pdo-> prepare('SELECT * from productss ORDER BY create_date DESC');

}
$statement ->execute();
$products = $statement-> fetchAll(PDO::FETCH_ASSOC);
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

<form class="mb-3 pt-2 input-group">
  <input type="text" class="form-control"  placeholder="Search for a product" aria-label="Example text with button addon" aria-describedby="button-addon1"
    name="search" value="<?php echo $search?>">
    <button class="btn btn-outline-secondary" type="button"  id="button-addon1">Search</button>
</form>

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
   <?php  foreach($products as $indx => $product) {?>
     <tr>
      <th scope="row"><?php echo $indx +1 ?></th>
      <td>
        <img src="<?php echo $product['img'] ?>" alt="<?php echo $product['title'] ?>" class="product-image">    
      </td>
        <td><?php echo $product['title'] ?></td>
        <td><?php echo $product['price'] ?></td>
        <td><?php echo $product['create_date'] ?></td>
        <td>
        <a href="update.php?id=<?php echo $product['id']?>" type="button" class="btn btn-info">Edit</a>
        <a href='delete.php?id=<?php echo $product['id']?>' type="button" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  </body>
</html>