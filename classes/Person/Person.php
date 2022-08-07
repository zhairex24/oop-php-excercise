<?php

namespace Person;

class Person {
    // Properties
    private $name;
    private $eyeColor;
    private $age;

    /**
     * Methods
     * By using  type declaration, we can throw an error if wrong type is given!
     * Works with:
     *  - class/inferface
     *  - self (used to reference to same class)
     *  - array
     *  - callable
     *  - bool
     *  - float
     *  - int
     *  - string
     *  - iterable
     *  - object
     */

    // static property is for if you want to create an object that you dont want this "static property" to be in the object
    public static $drinkingAge = 30;

    public function __construct($name, $eyeColor, $age) {
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->age = $age;
    }

    // Methods
    public function setName(string $name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getDA() {
        return self::$drinkingAge;
    }

    public static function setDrinkingAge($newDA) {
        self::$drinkingAge = $newDA;
    }
}