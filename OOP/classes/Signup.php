<?php

class Signup extends Database {

    private string $username;
    private string $password;

    public function __construct(string $username, string $password){
        $this->username = $username;
        $this->password = $password;
    }

}