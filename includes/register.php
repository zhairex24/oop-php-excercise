<?php

if(isset($_POST['submit'])) {

    // Grabbing the data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];

    // Instantiate RegisterController class
    include "../classes/Dbh.php";
    include "../classes/User.php";
    include "../classes/RegisterController.php";

    $registerControllerObj = new RegisterController($username, $email, $password, $confirm_password, $first_name, $last_name, $date_of_birth);

    // Running error handlers and user signup
    $registerControllerObj->addUser();

    // Going to back to front page
    header("location: ../index.php?error=none");
}