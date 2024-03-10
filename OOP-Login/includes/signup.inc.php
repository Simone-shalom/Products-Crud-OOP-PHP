<?php

$username=$password=$passwordRepeat=$email = '';

if($_SERVER['REQUEST_METHOD']==='POST'){
    // take data from post method
    $username=$_POST['username'];
    $password=$_POST['password'];
    $passwordRepeat=$_POST['passwordRepeat'];
    $email=$_POST['email'];

    echo $email . $password . $passwordRepeat .'';

    // Instantiate SignUp Controller class
    include "../classes/signup.Controller.php";
    include "../classes/signup.class.php";

    $signup = new SignupController($username, $password, $passwordRepeat, $email); 


    // Error handling

    // Redirect to index.php


}