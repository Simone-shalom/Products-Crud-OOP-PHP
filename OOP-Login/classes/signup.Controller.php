<?php

class SignupController extends Signup {
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

    public function signUpUser(){
        if($this->isEmpty() === false){
            // Empty inputs
            header ("Location:" . $_SERVER['DOCUMENT_ROOT'] . '/index/php?error=emptyinput');
            exit();
        }

         if($this->isValidUsername() === false){
            // Invalid username
            header ("Location:" . $_SERVER['DOCUMENT_ROOT'] . '/index/php?error=username');
            exit();
        }

         if($this->isValidEmail() === false){
            // Invalid email
            header ("Location:" . $_SERVER['DOCUMENT_ROOT'] . '/index/php?error=email');
            exit();
        }

         if($this->isValidPassword() === false){
            // Invalid password
            header ("Location:" . $_SERVER['DOCUMENT_ROOT'] . '/index/php?error=password');
            exit();
        }

           if($this->isPasswordMatch() === false){
            // Passwords do not match
            header ("Location:" . $_SERVER['DOCUMENT_ROOT'] . '/index/php?error=passwordMatch');
            exit();
        }
           if($this->isUserTaken() === false){
            // User already exists
            header ("Location:" . $_SERVER['DOCUMENT_ROOT'] . '/index/php?error=userTaken');
            exit();
        }

        // if empty with errors create User
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

    private function isUserTaken(){
        $result = false;
        if($this->userExists($this->username, $this->email)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}