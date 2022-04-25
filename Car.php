<?php

require_once 'Vehicle.php';

class Car extends Vehicle
{
  private string $energy;
  private int $energyLevel;
  private bool $hasParkBrake = true;

  public const ALLOWED_ENERGIES = [
    'fuel',
    'electric'
  ];

  public function __construct(string $color, int $nbSeats, string $energy)
  {
    parent::__construct($color, $nbSeats, 4);
    $this->setEnergy($energy);
  }

  public function start()
  {
    $this->setCurrentSpeed(0);
    $this->setEnergyLevel(100);
    if($this->hasParkBrake === true)
    {
      throw new Exception('Le frein à main, débile ! <br>');
    }
  }

  public function setHasParkBrake()
  {
    $this->hasParkBrake = !$this->hasParkBrake;
    if($this->hasParkBrake === true)
    {
      return 'Le frein à main a été enclenché <br>';
    }
    else
    {
      return 'Le frein à main a été désactivé <br>';
    }
  }

  public function getEnergy(): string
  {
    return $this->energy;
  }

  public function setEnergy($energy): Car
  {
    if (in_array($energy, self::ALLOWED_ENERGIES)) {
      $this->energy = $energy;
    }
    return $this;
  }

  public function getEnergyLevel(): int
  {
    return $this->energyLevel;
  }

  public function setEnergyLevel($energyLevel): void
  {
    $this->energyLevel = $energyLevel;
  }
}