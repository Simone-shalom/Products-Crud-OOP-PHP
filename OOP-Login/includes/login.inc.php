<?php 

$username = $password = '';
// take values from post method -login
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Instantiate loginUser login class
    

    // check for errors, login the user and redirect

}