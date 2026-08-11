<?php

namespace Waveforms\Potentiometers;

use GeneralPurposeIO\Core\MagicAliases\Circuit;
use Waveforms\Contracts\Actuation\Actuator as ActuatorContract;
use Waveforms\Contracts\Actuation\ActuatorException;
use Waveforms\Contracts\Actuation\Interfaces\Potentiometer as PotentiometerCircuit;
use Waveforms\PhysicalDevices\AbstractActuator;

class Potentiometer extends AbstractActuator implements ActuatorContract
{
    public function __construct(
        protected PotentiometerCircuit $potentiometer,
    ) {}

    public function raw(): int
    {
        return $this->potentiometer->raw();
    }

    public function position(): float
    {
        return $this->potentiometer->position();
    }

    public static function circuit(string $driver): static
    {
        $circuit = Circuit::profile($driver);

        if ($circuit instanceof PotentiometerCircuit) {
            return new static($circuit);
        }

        throw new ActuatorException("Circuit [{$driver}] is not a Potentiometer.");
    }
}
