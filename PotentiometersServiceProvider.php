<?php

namespace Waveforms\Potentiometers;

use Fabricate\NutsAndBolts\ServiceProvider;
use Waveforms\Core\MagicAliases\Actuator;

class PotentiometersServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        if (config('waveforms.potentiometer.enabled', false)) {
            Actuator::addActuator('potentiometer', Potentiometer::class);
        }
    }
}
