<?php

require 'foreach.php';

class Car {

    public $prop1 = "This is the default text";

    public function __construct()
    {
        echo 'The class ' . __CLASS__ . " was created. \n";
    }

    public function __destruct()
    {
        echo "This is destroyed...";
    }

    public function __toString()
    {
        return 'using the toString magic method...';
    }

}

class MiniCar extends Dwarves
{

}

$myCar = new Car();

echo $myCar;

unset($myCar);





echo "End of file.<br /> \n";