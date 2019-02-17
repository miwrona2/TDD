<?php

namespace App;

class SpeedMother {
    public static function random(): Speed
    {
        $speed = new Speed();
        $speed->value = rand(1, 200);
        return $speed;

    }

    public static function zero(): Speed
    {
        $speed = new Speed();
        $speed->value = 0;
        return $speed;
    }
}