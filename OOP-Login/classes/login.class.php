<?php

class Login extends Database{
 
    protected function getUser( string $username, string $password ){
        // select the password
        $statement= $this->connect()->prepare("SELECT password FROM users WHERE username=:username");
        $statement->bindValue("username", $username, PDO::PARAM_STR );
        $statement->execute();

        // check if passwords are same 
        $passwordHashed = $statement->fetch(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]['password']); 
        
        if( $checkPassword === false ){
            $statement = null;
            header("Location: /Products-Crud-OOP/OOP-Login/index.php?error=wrongPassword");
            exit();
        }elseif($checkPassword === true){
              // if password is same, select the user 
            $statement = $this->connect()->prepare("SELECT * FROM users WHERE username=:username, password=:password");
            $statement->bindValue("username", $username, PDO::PARAM_STR );
            $statement->bindValue("password", $passwordHashed[0]['password'], PDO::PARAM_STR );
            $statement->execute();

            // take user and assign session global with user data
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["id"] = $user[0]["id"];
            $_SESSION["username"] = $user[0]["username"];

        }
    }
}