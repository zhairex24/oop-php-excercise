<?php

if(isset($_POST['submit'])) {

    // Grabbing the data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $date_of_birth = $_POST['date_of_birth'];

    // Instantiate UserController class
    include "../classes/Dbh.php";
    include "../classes/User.php";
    include "../classes/UserController.php";

    $userControllerObj = new UserController($first_name, $last_name, $date_of_birth);

    // Running error handlers and user signup
    $userControllerObj->addUser();

    // Going to back to front page
    header("location: ../index.php?error=none");
}