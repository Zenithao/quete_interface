<?php
require_once 'Vehicle.php';

class Truck extends Vehicle
{
    private int $capacity;
    private int $lading = 0;
    private string $energyType;

    public function __construct(string $color, int $nbSeats, string $energyType, int $capacity)
    {
        parent::__construct($color, $nbSeats);
        $this->setenergyType($energyType);
        $this->setCapacity($capacity);
        $this->setnbWheels(4);
        echo "Nouveau camion créer !";
    }

    /**
     * Get the value of capacity
     */ 
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set the value of capacity
     *
     * @return  self
     */ 
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

    }

    /**
     * Get the value of lading
     */ 
    public function getLading()
    {
        return $this->lading;
    }

    /**
     * Set the value of lading
     *
     * @return  self
     */ 
    public function setLading($lading)
    {
        $this->lading = $lading;

    }

    /**
     * Get the value of energyType
     */ 
    public function getEnergyType()
    {
        return $this->energyType;
    }

    /**
     * Set the value of energyType
     *
     * @return  self
     */ 
    public function setEnergyType($energyType)
    {
        $this->energyType = $energyType;

    }
    
    public function is_full() :string
    {
        if($this->capacity < $this->lading){
            return "full";
        } else {
            return "in filling";
        }
    }
}