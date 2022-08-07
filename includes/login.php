<?php

if(isset($_POST['submit'])) {

    // Grabbing the data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Instantiate LoginController class
    include "../classes/Dbh.php";
    include "../classes/Login.php";
    include "../classes/LoginController.php";

    $loginControllerObj = new LoginController($username, $password);

    // Running error handlers and user signup
    $loginControllerObj->addUser();

    // Going to back to front page
    header("location: ../index.php?error=none");
}