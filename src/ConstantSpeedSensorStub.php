<?php

namespace App;


final class ConstantSpeedSensorStub implements SpeedSensor
{
    private $speed;

    public function __construct(Speed $speed)
    {
        $this->speed = $speed;
    }

    public function current(): Speed
    {
        return $this->speed;
    }
}