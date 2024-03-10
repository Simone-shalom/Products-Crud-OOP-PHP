<?php

class Signup extends Database {

    protected function setUser( string $username, string $email, string $password){
        // create a statement
        $statement = $this->connect()->prepare("INSERT INTO users(username, password, email)
            VALUES (:username, :email, :password)");
         // hash the password
        $hashedPassword = password_hash( $password, PASSWORD_DEFAULT );
        // bind values
        $statement -> bindValue(':username', $username);
        $statement -> bindValue(':email', $email);
        $statement -> bindValue(':password', $hashedPassword);
        // execute an statement
        $statement -> execute();
    }

    protected function userExists( string $username, string $email){
        $statement = $this->connect()->prepare('SELECT username FROM users WHERE username = :username OR email = :email; ');
        $statement -> bindValue(':username', $username);
        $statement -> bindValue(':email', $email);
        $statement->execute();

        $resultCheck = false;
        if($statement->rowCount() > 0){
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}