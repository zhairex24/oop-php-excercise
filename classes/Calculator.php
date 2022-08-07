<?php

class Calculator {
    public $operator;
    public $number1;
    public $number2;

    public function __construct(string $operator, int $number1, int $number2) {
        $this->operator = $operator;
        $this->number1 = $number1;
        $this->number2 = $number2;
    }

    public function calculator() {
        switch ($this->operator) {
            case 'addition':
                $result = $this->number1 + $this->number2;
                return $result;
                break;

            case 'subtraction':
                $result = $this->number1 - $this->number2;
                return $result;
                break;
                
            case 'multiplication':
                $result = $this->number1 * $this->number2;
                return $result;
                break;

            case 'division':
                $result = $this->number1 / $this->number2;
                return $result;
                break;
            
            default:
                echo 'Error!';
                break;
        }
    }
}