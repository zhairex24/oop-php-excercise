<?php

class Login extends Dbh {
    protected function getUser($username, $password) {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE username = ? OR email = ?;');
        // var_dump($username, $password, $stmt, $stmt->execute([$username, $username]), $stmt->rowCount());
        // die();
        if(!$stmt->execute([$username, $username])) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfoundss");
            exit();
        }

        $passwordHashed = $stmt->fetchAll();
        $checkPassword = password_verify($password, $passwordHashed[0]['password']);
        
        if($checkPassword == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        } elseif($checkPassword == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');

            if(!$stmt->execute([$username, $username, $password])) {
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: ../index.php?error=usernotfoundssasd");
                exit();
            }

            $user = $stmt->fetchAll();
            session_start();
            $_SESSION['userid'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];
            // var_dump($user[0]['id'], $user[0]['username'], $_SESSION['userid'], $_SESSION['username']);
            // die();
            $stmt = null;
        }

        $stmt = null;
    }
}