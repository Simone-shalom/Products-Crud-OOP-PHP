<?php

class Database {
    private $host = 'localhost';
    private $dbname = 'mydatabase';
    private $dbusername = 'dbusername';
    private $dbpassword = '';

    protected function connect(){
        try {

            $pdo = new PDO("mysql:host=" .$this->host . ";dbname=" . $this->dbname,
                $this->dbusername, $this->dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        }catch(Exception $e){
            die('Connection failed'. $e->getMessage());
        }
    }
}