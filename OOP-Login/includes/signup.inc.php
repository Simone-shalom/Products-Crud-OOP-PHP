<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

var_dump($_POST); // 

$username = $password = $passwordRepeat =$email = '';

if($_SERVER['REQUEST_METHOD']=='POST'){
// if (isset($_POST['submit'])){
    // take data from post method
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $passwordRepeat = trim($_POST['passwordRepeat']);
    $email = trim($_POST['email']);

    echo $email . $password . $passwordRepeat .'';

    // Instantiate SignUp Controller class
    include '../classes/database.class.php';
    include "../classes/signup.class.php";
    include "../classes/signup.Controller.php";

    $signup = new SignupController($username, $password, $passwordRepeat, $email); 
    // Error handling and signin the user
    $signup->signUpUser();

   // Redirect to index.php
    header("Location: /Products-Crud-OOP/OOP-Login/index.php?error=none");
    exit(); // or die();
}
echo 'sthhhh';
