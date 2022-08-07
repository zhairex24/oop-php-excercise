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
        try {
            $person1 = new Person\Person("Eloy loves", "Blue", 26);
            echo $person1->getName();
            $person1->setName("Mariannn");
            echo $person1->getName();
        } catch (\Throwable $th) {
            echo "Error message: " . $th->getMessage();
        }
        echo Person\Person::$drinkingAge;
        Person\Person::setDrinkingAge(1);
        echo Person\Person::$drinkingAge;
    ?>
</body>
</html>