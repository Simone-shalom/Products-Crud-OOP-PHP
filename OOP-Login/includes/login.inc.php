<?php 

$username = $password = '';
// take values from post method -login
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Instantiate loginUser login class
    include "../classes/database.class.php";
    include "../classes/login.class.php";
    include "../classes/login.controller.php";

    $login = new LoginController($username, $password);
    $login->loginUser();
    // check for errors, login the user and redirect
    header("Location: /Products-Crud-OOP/OOP-Login/index.php?error=none");
    exit(); // or die();
}