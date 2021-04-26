<?php

require_once 'Highway.php';

final class MotorWay extends Highway
{
    
    public function __construct()
    {
        $this->setNbLane(4);
        $this->setMaxSpeed(130); 
        echo "MotorWay";
    }

    public function addVehicule(Vehicle $vehicle)
    {
        if($vehicle instanceof Car || $vehicle instanceof Truck){
            $this->currentVehicules[] = $vehicle;
            if($vehicle instanceof Car){
                echo "Une nouvelle voiture est entrée sur la voie.<br>";
            } else {
                echo "Un nouveau camion est entré sur la voie.<br>";
            }
        } else {
            echo "Les véhicules de type " . strtolower(get_class($vehicle)) . " ne sont pas autorisés sur ce type de voie.<br>";
        }
    }
}