<?php

class Car {
    // Properties//Fields
    private $id;
    public $color;
    protected $name;
    public $vehicleType = 'car';

    // Contructor
    public function __construct($id, $color, $name) {
        $this->id = $id;
        $this->color = $color;
        $this->name = $name;
    }
    // function display car
    public function displayCar(){
        return''. $this->id .' '. $this->color . ' '. $this->name .'';
    }
}
// create a new instance of a Car class
$Car01 = new Car(1,"red", "bmw");
$Car02 = new Car(2,"blue", "toyota");
$Car03 = new Car(3,"black", "volvo");

// display it
echo $Car01->displayCar();
echo '<br>';
echo $Car02->vehicleType;
echo '<br>';

