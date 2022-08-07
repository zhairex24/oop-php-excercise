<?php
    // include "./includes/Person.php";
    declare(strict_types = 1);
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

    <form action="includes/register.php" method="post">
        <input type="text" name="first_name" placeholder="First Name">
        <input type="text" name="last_name" placeholder="Last Name">
        <input type="date" name="date_of_birth" placeholder="Birthday">
        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>