<?php

trait Validator {
    private function emptyInput() {
        $result;
        if(empty($this->first_name) || empty($this->last_name) || empty($this->date_of_birth)) {
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

    private function checkUserIfExist() {
        $result;
        if(!$this->checkUser($this->first_name, $this->last_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

class UserController extends User {
    use Validator;
    private $username;
    private $email;
    private $first_name;
    private $last_name;
    private $date_of_birth;

    public function __construct($first_name, $last_name, $date_of_birth) {
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

        if($this->checkUserIfExist() == false) {
            header("location: ../index.php?error=firstnameorlastnametaken");
            exit();
        }

        $this->createUser($this->first_name, $this->last_name, $this->date_of_birth);
    }
}