<?php

class Signup extends Database {
    protected function userExists($username, $email){
        $statement = $this->connect()->prepare('SELECT username FROM users WHERE username = :username OR email = :email; ');
        $statement -> bindValue(':username', $username);
        $statement -> bindValue(':email', $email);
        $statement->execute();

        $resultCheck = false;
        if($statement->rowCount() > 0){
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}