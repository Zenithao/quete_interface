<?php
require_once 'Bicycle.php';

class Bike extends Bicycle implements LightableInterface
{
    public function __construct(string $color, int $nbSeats)
    {
        parent::__construct($color, $nbSeats);
        $this->setNbSeats($nbSeats);
        echo "Nouveau vélo créer !";
    }

    public function switchOn(): bool
    {
        if ($this->currentSpeed > 10){
            return true;
        } else {
            return false;
        }
    }

    public function switchOff(): bool
    {
        return false;
    }
}