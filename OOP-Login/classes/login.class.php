<?php

class Login extends Database{
 
    protected function getUser( string $username, string $password ){
        // select the password
        $statement= $this->connect()->prepare("SELECT password FROM users WHERE username=:username");
        $statement->bindValue("username", $username);
        $statement->execute();

        // check if passwords are same 
        $passwordHashed = $statement->fetch(PDO::FETCH_ASSOC);
       // Check if the provided password matches the hashed password
        if ($passwordHashed && password_verify($password, $passwordHashed['password'])) {
            // Password is correct
            // Retrieve the user based on the username only
            $statement = $this->connect()->prepare("SELECT * FROM users WHERE username = :username");
            $statement->bindValue(":username", $username);
            $statement->execute();

            // Fetch the user data
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            // Start session and store user data
            session_start();
            $_SESSION["id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
        } else {
            // Password is incorrect
            header("Location: /Products-Crud-OOP/OOP-Login/index.php?error=wrongPassword");
            exit();
        }
    }
}