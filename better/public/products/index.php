<?php

// 4:02 but add images part 
// start refactoring
// get db connection
require_once "../../database.php";

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

<?php require_once "../../views/partials/header.php"?>
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
        <img src="/<?php echo $product['img'] ?>" alt="<?php echo $product['title'] ?>" class="product-image">    
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