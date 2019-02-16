<?php

namespace App;

final class CruisingControlSystem
{
    private $expectedSpeed;

    public function __construct(Speed $expectedSpeed) 
    {
        $this->expectedSpeed = $expectedSpeed;
    }

    public function control(SpeedSensor $speedSensor, Engine $engine): void
    {
        if($speedSensor->current()->isZero()) {
            throw new Exception('Car is stopped, can\'t set the speed');
        }

        if($speedSensor->current()->lowerThan($this->expectedSpeed)) {
            $engine->speedUp();
        }

        if($speedSensor->current()->greaterThan($this->expectedSpeed)) {
            $engine->speedDown();
        }
    }
}