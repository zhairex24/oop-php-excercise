<?php

class User extends Dbh {
    protected function checkUser($first_name, $last_name) {
        $stmt = $this->connect()->prepare('SELECT first_name FROM users WHERE first_name = ? OR last_name = ?;');

        if(!$stmt->execute([$first_name, $last_name])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $resultCheck;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

    protected function getUsers() {
        // $sql = "SELECT * FROM users WHERE first_name = ? ";
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        return $results;
    } 

    protected function createUser($first_name, $last_name, $date_of_birth) {
        // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (first_name, last_name, date_of_birth) VALUES (?, ?, ?)" ;
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute([$first_name, $last_name, $date_of_birth])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailedcreteuser");
            exit();
        }
        $stmt = null;
    } 
}