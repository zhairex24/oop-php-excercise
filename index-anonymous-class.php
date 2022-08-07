<?php

include_once "classes/SimpleClass.php";

$obj = new SimpleClass();
$obj->helloWorld();

// Anonymous class
$newObj = new class() {
    public function helloWorld() {
        echo "Hello World! anonymouse";
    }
};

$newObj->helloWorld();