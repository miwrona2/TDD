<?php

namespace App;

class SpeedMother {
    public static function random(): Speed
    {
        $speed = new Speed();
        $speed->value = 60;
        return $speed;

    }
}