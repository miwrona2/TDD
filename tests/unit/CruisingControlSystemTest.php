<?php

use PHPUnit\Framework\TestCase;

final class CruisingControlSystemTest extends TestCase
{
    public function test_increasing_speed_when_sensor_says_the_current_speed_is_too_low()
    {
        $speed = SpeedMother::random();

        $ccs = new CruisingControlSystem($speed);
        $engineSpy = new EngineSpeedSpy();

        $ccs->control(
            new ConstantSpeedSensorStub($speed->decreaseByTimes(2)),
            $engineSpy
        );

        $this->assertTrue($engineSpy->speedIncreased);
        $this->assertFalse($engineSpy->speedDecreased);
    }
}