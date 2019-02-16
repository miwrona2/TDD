<?php 

require __DIR__.'/../vendor/autoload.php';


use App\Speed;
use App\ConstantSpeedSensorStub;
use App\RandomSpeedSensorFake;
use App\SpeedMother;



$speed = new Speed();
$speed->value = 60;


$constantSpeedSensorStub = new ConstantSpeedSensorStub($speed);
//var_dump($constantSpeedSensorStub);

$fake = new RandomSpeedSensorFake();
$current = $fake->current();
//print_r($current);

$random = SpeedMother::random();
var_dump($random);
