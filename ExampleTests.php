<?php

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

final class EngineSpeedSpy implements Engine
{
    public $speedIncreased;
    public $speedDecreased;

    public function __construct()
    {
        $this->speedDecreased = false;
        $this->speedIncreased = false;
    }

    public function speedUp(): void
    {
        $this->speedIncreased = true;
    }

    public function speedDown(): void
    {
        $this->speedDecreased = true;
    }
}

final class EngineDummy implements Engine
{
    public function speedUp(): void
    {
    }

    public function speedDown(): void
    {
    }
}

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
