<?php

class Dbh {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "oop_tutorial_db";

    protected function connect() {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); # this is a optional attribute: pull out data from database as associative array
            return $pdo;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
}