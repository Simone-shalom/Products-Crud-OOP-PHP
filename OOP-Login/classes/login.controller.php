<?php

class LoginController {
    private string $username; 
    private string $password; 

    public function __construct(string $password, string $username) {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser(){
         if($this->isEmpty() === false){
        // Empty inputs
        header("Location: /Products-Crud-OOP/OOP-Login/index.php?error=emptyinput");
        exit();
    }
        // getUser if no errors
    

    }

     private function isEmpty(){
        $result=false;
        if(empty($this->username) || empty($this->password)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

}