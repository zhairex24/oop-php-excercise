<?php
//  Visibility and Inheritance
class Person {
    protected $first = "Pedro";
    protected $last = "Penduco";
    protected $age = "28";

    public function owner() {
        $first = $this->first;
        return $first;
    }
}

// "extends" apply the inheritance
class Pet extends Person {
    public function owner() {
        $first = $this->first;
        return $first;
    }
}