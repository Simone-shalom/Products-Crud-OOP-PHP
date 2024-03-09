<?php

class Signup extends Database {

    private string $username;
    private string $password;

    public function __construct(string $username, string $password){
        $this->username = $username;
        $this->password = $password;
    }

    private function insertUser(){
        $query = "INSERT INTO users ('username', 'password') VALUES 
            (:username, :password);";
        $statement = parent::connect()->prepare( $query );
        $statement->bindValue(":username", $this->username, PDO::PARAM_STR );
        $statement->bindValue(":password", $this->password, PDO:: PARAM_STR );
        $statement->execute();
    }

}