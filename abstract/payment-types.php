<?php

abstract class Visa {
    public function visaPayment() {
        return "Perform a visa payment.";
    }

    abstract public function getPayment();  
}