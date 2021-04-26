<?php

final class PedestrianWay extends Highway
{
    public function __construct()
    {
        $this->setNbLane(1);
        $this->setMaxSpeed(10);
        echo "PedestrianWay";
    }

    public function addVehicule(Vehicle $vehicle)
    {
        if($vehicle instanceof Bike || $vehicle instanceof Skateboard){
            $this->currentVehicules[] = $vehicle;
            if($vehicle instanceof Bike){
                echo "Un nouveau vélo est entré sur la voie.<br>";
            } else {
                echo "Un nouveau skateboard est entré sur la voie.<br>";
            }
        } else {
            echo "Les véhicules de type " . strtolower(get_class($vehicle)) . " ne sont pas autorisés sur ce type de voie.<br>";
        }
    }
}