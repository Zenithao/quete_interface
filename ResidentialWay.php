<?php

final class ResidentialWay extends Highway
{
    public function __construct()
    {
        $this->setNbLane(2);
        $this->setMaxSpeed(50);
        echo "ResidentialWay";
    }


    public function addVehicule(Vehicle $vehicle)
    {
        $this->currentVehicules[] = $vehicle;
        if($vehicle instanceof Bike){
            echo "Un nouveau vélo est entré sur la voie.<br>";
        } elseif($vehicle instanceof Skateboard) {
            echo "Un nouveau skateboard est entré sur la voie.<br>";
        } elseif($vehicle instanceof Car){
            echo "Une nouvelle voiture est entrée sur la voie.<br>";
        } elseif($vehicle instanceof Truck){
            echo "Un nouveau camion est entré sur la voie.<br>";
        }
    }
}