<?php
require_once 'Vehicle.php';

abstract class Bicycle extends Vehicle
{
    public function __construct(string $color, int $nbSeats)
    {
        parent::__construct($color, $nbSeats);
        $this->setnbWheels(2);
    }
}