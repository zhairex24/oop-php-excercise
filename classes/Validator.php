<?php

class Validator {
    private function emptyInput() {
        $result;
        if(empty($this->first_name) || empty($this->last_name) || empty($this->date_of_birth)) {
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