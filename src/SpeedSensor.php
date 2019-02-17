<?php

namespace App;

interface SpeedSensor {
    public function current(): Speed;
}