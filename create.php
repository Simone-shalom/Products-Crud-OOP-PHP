<?php 
// we are getitng the data from _GET _POST methods

//setup connection to db with pdo
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products-crud","root","");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




var_dump($_POST)
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
  <!-- get search for,applies query filters, it is in the url -->
  <!-- for every other like db actions, user data use post-->
<form action='' method="post">
  <h1>Create a new Product</h1>
  <div class="mb-3">
    <label for="prd" class="form-label">Product Title</label>
    <input type="text" class="form-control" id="prd" name="title" >
    <div id="prd" class="form-text">Add name to a new product</div>
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Description</label>
    <input type="text" class="form-control" id="desc" name="desc">
  </div>
  <div class="mb-3">
    <label for="img" class="form-label">Image</label>
    <input type='file' class="form-control" id="img" name="img">
  </div>
   <div class="mb-3">
    <label for="price" class="form-label">Price</label>
    <input type="number" step="0.1" class="form-control" id="price" name="price">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>