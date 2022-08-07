<?php

declare(strict_types = 1);
include "autoloader.php";

$operator = $_POST['operator'];
$number1 = $_POST['number1'];
$number2 = $_POST['number2'];

$calculator = new Calculator($operator, (int)$number1, (int)$number2);

try {
    echo $calculator->calculator();
} catch (\Throwable $th) {
    echo "Error!: " . $th->getMessage();
}