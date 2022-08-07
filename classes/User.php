<?php

class User extends Dbh {
    protected function checkUser($username, $email) {
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if(!$stmt->execute([$username, $email])) {
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

    protected function createUser($username, $email, $password, $first_name, $last_name, $date_of_birth) {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (username, email, password, first_name, last_name, date_of_birth) VALUES (?, ?, ?, ?, ?, ?)" ;
        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute([$username, $email, $hashedPwd, $first_name, $last_name, $date_of_birth])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailedtocreateuser");
            exit();
        }
        $stmt = null;
    } 
}