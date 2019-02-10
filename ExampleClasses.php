<?php

class ExampleClasses
{

}

class Speed {
    const UNIT = 'km/h';
    public $value;

    public function isZero()
    {
        return $this->value === 0;
    }

}

interface SpeedSensor {
    public function current():Speed;
}

interface Engine {
    public function speedUp(): void;
    public function speedDown(): void;
}

class SpeedMother {
    public static function random(): Speed
    {
        $speed = new Speed();
        $speed->value = 60;
        return $speed;

    }
}