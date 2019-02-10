<?php 

require_once 'CruisingControlSystem.php';
require_once 'ExampleClasses.php';
require_once 'ExampleTests.php';

echo 'index file';

$speed = new Speed();
$speed->value = 60;


$constantSpeedSensorStub = new ConstantSpeedSensorStub($speed);
//var_dump($constantSpeedSensorStub);

$fake = new RandomSpeedSensorFake();
$current = $fake->current();
print_r($current);
