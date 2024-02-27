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