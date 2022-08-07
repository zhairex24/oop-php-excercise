<?php

if(isset($_POST['submit'])) {

    // Grabbing the data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiate LoginController class
    include "../classes/Dbh.php";
    include "../classes/Login.php";
    include "../classes/LoginController.php";

    $loginControllerObj = new LoginController($username, $password);

    // Running error handlers and user signup
    $loginControllerObj->loginUser();

    // Going to back to front page
    header("location: ../index.php?error=none");
}