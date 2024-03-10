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

}