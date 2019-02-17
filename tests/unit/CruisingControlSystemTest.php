<?php

use PHPUnit\Framework\TestCase;
use App\CruisingControlSystem;
use App\SpeedMother;
use App\EngineSpeedSpy;
use App\ConstantSpeedSensorStub;
use App\Engine;
use App\EngineDummy;
use RuntimeException;

final class CruisingControlSystemTest extends TestCase
{
    public function tes_increasing_speed_when_sensor_says_the_current_speed_is_too_low()
    {
        $speed = SpeedMother::random();

        $ccs = new CruisingControlSystem($speed);
        $engineSpy = new EngineSpeedSpy();

        $ccs->control(
            new ConstantSpeedSensorStub((clone $speed)->decreaseByTimes(2)),
            $engineSpy
        );

        $this->assertTrue($engineSpy->speedIncreased);
        $this->assertFalse($engineSpy->speedDecreased);
    }

    public function tes_increasing_speed_when_sensor_says_the_current_speed_is_too_high()
    {
        $speed = SpeedMother::random();

        $ccs = new CruisingControlSystem($speed);
        $engineSpy = new EngineSpeedSpy();

        $ccs->control(
          new ConstantSpeedSensorStub((clone $speed)->increaseByTimes(2)),
          $engineSpy
        );

        $this->assertFalse($engineSpy->speedIncreased);
        $this->assertTrue($engineSpy->speedDecreased);
    }

    public function tes_not_changing_speed_when_sensor_says_the_current_speed_is_fine()
    {
        $speed = SpeedMother::random();
        $ccs = new CruisingControlSystem($speed);

        $engineMock = $this->createMock(Engine::class);
        $engineMock->expects($this->never())
            ->method('speedUp');
        $engineMock->expects($this->never())
            ->method('speedDown');
        $ccs->control(
            new ConstantSpeedSensorStub($speed),
            $engineMock
        );
    }

    public function test_controlling_speed_when_speed_sensor_tells_that_car_is_stopped()
    {
        $ccs = new CruisingControlSystem(SpeedMother::random());

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Car is stopped, can\'t set the speed');

        $ccs->control(
            new ConstantSpeedSensorStub(SpeedMother::zero()),
            new EngineDummy()
        );
    }
}