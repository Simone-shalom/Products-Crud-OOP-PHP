<?php

class LoginController {
    private string $username; 
    private string $password; 

    public function __construct(string $password, string $username) {
        $this->username = $username;
        $this->password = $password;
    }

    
}