<?php

trait Validator {
    private function emptyInput() {
        $result;
        if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirm_password) || empty($this->first_name) || empty($this->last_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidString($string) {
        $result;
        if(!preg_match("/^[a-zA-Z]*$/", $string)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    
    private function invalidUsername() {
        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidEmail() {
        $result;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function passwordMatch() {
        $result;
        if($this->password !== $this->confirm_password) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function checkUserIfExist() {
        $result;
        if(!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

class RegisterController extends User {
    use Validator;
    private $username;
    private $email;
    private $password;
    private $confirm_password;
    private $first_name;
    private $last_name;
    private $date_of_birth;

    public function __construct($username, $email, $password, $confirm_password, $first_name, $last_name, $date_of_birth) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->date_of_birth = $date_of_birth;
    }

    

    public function addUser() {
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        if($this->invalidString($this->first_name) == false) {
            header("location: ../index.php?error=firstname");
            exit();
        }

        if($this->invalidString($this->last_name) == false) {
            header("location: ../index.php?error=lastname");
            exit();
        }

        if($this->passwordMatch() == false) {
            header("location: ../index.php?error=passworddoesnotmatch");
            exit();
        }
        
        if($this->checkUserIfExist() == false) {
            header("location: ../index.php?error=usernameoremailtaken");
            exit();
        }

        $this->createUser($this->username, $this->email, $this->password, $this->first_name, $this->last_name, $this->date_of_birth);
    }
}