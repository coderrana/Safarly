<?php

class Hotel {
    public $name;
    public $location;
    public $price;

    public function __construct($name, $location, $price) {
        $this->name = $name;
        $this->location = $location;
        $this->price = $price;
    }
}
