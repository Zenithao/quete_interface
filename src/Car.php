<?php
require_once 'Vehicle.php';

class Car extends Vehicle implements LightableInterface
{
    private string $energyType;
    private int $fuelLevel = 25;
    private bool $hasParkBrake = true;

    public function __construct(string $color, int $nbSeats, string $energyType)
    {
        parent::__construct($color, $nbSeats);
        $this->setenergyType($energyType);
        $this->setnbWheels(4);
        echo "Nouvelle voiture créee !<br>";
    }

    public function switchOn(): bool
    {
        return true;
    }

    public function switchOff(): bool
    {
        return false;
    }

    public function getenergyType(): string
    {
        return $this->energyType;
    }

    public function setenergyType(string $energyType): void
    {
        $this->energyType = $energyType;
    }

    public function getfuelLevel(): int
    {
        return $this->fuelLevel;
    }

    public function setfuelLevel(int $fuelLevel): void
    {
        $this->fuelLevel = $fuelLevel;
    }

    public function setParkBrake(bool $hasParkBrake): void
    {
        $this->hasParkBrake = $hasParkBrake;
    }

    public function start()
    {
        if($this->hasParkBrake){
            throw new Exception('<strong>Attention, le frein à main est activé !</strong>');
        }
        if($this->currentSpeed === 0){
            return "Vroom!";
        } else {
            return "La voiture roule déjà!";
        }
    }
}