<?php

class SignupController {
    private string $username;
    private string $password;
    private string $passwordRepeat;
    private string $email;

    public function __construct(string $username, string $password, string $passwordRepeat, string $email){
        $this->username = $username;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->email = $email;
    }

    private function isEmpty(){
        $result=false;
        if(empty($this->username) || empty($this->password) 
            || empty(($this->passwordRepeat)) || empty($this->email)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function isValidUsername(){
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)){
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function isValidEmail(){
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

 
    private function isValidPassword(){
        $result = false;
        if((!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) || strlen($this->password < 8)){
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function isPasswordMatch(){
        $result = false;
        if($this->password !== $this->passwordRepeat){
            $result = false;
        }else {
            $result = true;
        }
        return $result;

    }

}