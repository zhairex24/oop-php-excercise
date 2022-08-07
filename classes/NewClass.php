<?php

class NewClass {
    // Properties
    public $data = "I am a property";
    private $eyeColor;
    private $age;

    public function __construct() {
        echo "This class has been instantiated <br>";
    }

    // Methods
    public function setNewProperty($newData) {
        $this->data = $newData;
    }

    public function getProperty() {
        return $this->data;
    }

    public function __destruct() {
        echo "<br> This is the end of the class!";
    }
}