<?php

abstract class Highway
{
    protected array $currentVehicules;
    protected int $nbLane;
    protected int $maxSpeed;

    public function __construct(int $nbLane, int $maxSpeed)
    {
        $this->setNbLane($nbLane);
        $this->setMaxSpeed($maxSpeed);
    }

    abstract public function addVehicule(Vehicle $vehicle);

    /**
     * Get the value of currentVehicules
     */ 
    public function getCurrentVehicules(): array
    {
        return $this->currentVehicules;
    }

    /**
     * Set the value of currentVehicules
     *
     * @return  self
     */ 
    public function setCurrentVehicules($currentVehicules): self
    {
        $this->currentVehicules = $currentVehicules;

        return $this;
    }

    /**
     * Get the value of nbLane
     */ 
    public function getNbLane(): int
    {
        return $this->nbLane;
    }

    /**
     * Set the value of nbLane
     *
     * @return  self
     */ 
    public function setNbLane($nbLane): self
    {
        $this->nbLane = $nbLane;

        return $this;
    }

    /**
     * Get the value of maxSpeed
     */ 
    public function getMaxSpeed(): int
    {
        return $this->maxSpeed;
    }

    /**
     * Set the value of maxSpeed
     *
     * @return  self
     */ 
    public function setMaxSpeed($maxSpeed): self
    {
        $this->maxSpeed = $maxSpeed;

        return $this;
    }
}