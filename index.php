<?php
    // include "./includes/Person.php";
    declare(strict_types = 1);
    session_start();
    include "./includes/autoloader.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // $userViewObject = new UserView();
        // $users = $userViewObject->showUsers();
        // $userControllerObject = new UserController();
        // $userControllerObject->addUser('Jane', 'Doe', '1996-07-28');
    ?>

    <?php
        if(isset($_SESSION['userid']) && isset($_SESSION['username'])) {
    ?>
        <h1>Hello!</h1> <?php  echo '<h3> My username is ' . $_SESSION['username'] . '</h3>' ?>

        <br>
        <a href="includes/logout.php">LOGOUT</a>
    <?php
        } else {
    ?>
        <form action="includes/register.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="confirm_password" placeholder="Confirm Password">
            <input type="text" name="first_name" placeholder="First Name">
            <input type="text" name="last_name" placeholder="Last Name">
            <input type="date" name="date_of_birth" placeholder="Birthday">
            <button type="submit" name="submit">Register</button>
        </form>
        
        <form action="includes/login.php" method="post">
            <input type="text" name="username" placeholder="Username or Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Login</button>
        </form>
    <?php
        }
    ?>
</body>
</html>