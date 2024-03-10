<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
</head>
<body>
 <form action="includes/signup.inc.php" method="post">

<div class="signUp">
    <h3>Sign Up</h3>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        <small id="username" class="form-text text-muted"> Set your username</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password"   name="password">
        <small id="username" class="form-text text-muted">Provide password</small>  
    </div>
    <div class="form-group">
        <label for="passwordRepeat">Repeat Password</label>
        <input type="password" class="form-control" id="passwordRepeat" name="passwordRepeat"  >
        <small id="username" class="form-text text-muted">Repeat the password</small>  
    </div>
    <div class="form-group ">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="your email">
    </div>
    <button  class="btn btn-primary">Signup</button>
</div>
</form>

<form>
<div>
    <h3>Login</h3>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        <small id="username" class="form-text text-muted"> Set your username</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password"   name="password">
        <small id="password" class="form-text text-muted">Provide password</small>  
    </div>
    <button type="submit" class="btn btn-primary">login</button>
</div>
</form>
</body>
</html>