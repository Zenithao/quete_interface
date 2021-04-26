<?php
require_once 'Vehicle.php';

final class Skateboard extends Vehicle
{
    public function __construct(string $color, int $nbSeats)
    {
        parent::__construct($color, $nbSeats);
        if($nbSeats > 1){
            echo "Il n'y a qu'une place sur un skateboard<br>";
        }
        $this->setNbSeats(1);
        $this->setnbWheels(4);
        echo "Nouveau skateboard créer !";
    }
}