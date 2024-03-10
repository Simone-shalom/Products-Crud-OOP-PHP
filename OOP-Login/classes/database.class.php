<?php

class Database{
    protected function connect(){
        try{
            $username = 'root';
            $password = '';
           //setup connection to db with pdo
            $pdo = new PDO("mysql:host=localhost;port=3306;dbname=oop-login",$username,$password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            die('Connection failed'. $e->getMessage());  
        }
    }
}