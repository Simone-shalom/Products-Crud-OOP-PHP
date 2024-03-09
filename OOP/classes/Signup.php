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

    private function isEmpty (){
        if(!isset($this->username) && !isset($this->password)){
            return true;
        } else {
            return false;
        }
    }

    private function signupUser(){
        // error handling 
        if($this->isEmpty()){
            header("Location:" . $_SERVER['DOCUMENT_ROOT'] . '/index/php') ;
            die();
        };
        // if no errors singup user
        $this->insertUser();
    }

}