<?php

class Test extends Dbh {
    public function getUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
            echo $row['first_name'] . ' ' . $row['last_name'] . ' ' . $row['date_of_birth'] . '<br>';
        }
    }
}