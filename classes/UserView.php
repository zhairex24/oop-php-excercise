<?php

class UserView extends User {
    public function showUsers() {
        $users = $this->getUsers();
        $html = "<ul>";
        foreach ($users as $key => $user) {
            $html .= "<li>" . $user['first_name'] . ' ' . $user['last_name'] . ' | ' . $user['date_of_birth'] . "</li>";
        }
        $html .= "</ul>";
        echo $html;
    }
}