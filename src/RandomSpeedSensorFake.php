<?php

namespace App;


final class RandomSpeedSensorFake implements SpeedSensor
{
    public function current(): Speed
    {
        do {
            $speed = SpeedMother::random();
        } while ($speed->isZero());

        return $speed;
    }
}
