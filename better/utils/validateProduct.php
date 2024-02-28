<?php
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

  if (!is_dir(__DIR__.'/public/images')) {
    mkdir(__DIR__.'/public/images');
}

// handling image uploads to images folder with random name to avoid same names
    $img = $_FILES['img'] ?? null;
    $imagePath = '';


    if($img && $img['tmp_name']){
        $imagePath = 'images/' . randomString(8) . '/' . $img['name'];
      mkdir(dirname(__DIR__.'/public/'.$imagePath));
      move_uploaded_file($img['tmp_name'], __DIR__.'/public/'.$imagePath);
    }

    // fck imagess not working