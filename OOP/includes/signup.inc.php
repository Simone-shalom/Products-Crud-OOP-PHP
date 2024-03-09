<?php

$username = $password = '';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_POST['username'];
    $password= $_POST['password'];

    require_once("../classes/Database.php");
    require_once("../classes/Signup.php");

    $singup = new Signup($username, $password);
    $singup->signupUser();

}