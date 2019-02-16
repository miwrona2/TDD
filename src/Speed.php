<?php

namespace App;

class Speed {
    const UNIT = 'km/h';
    public $value;

    public function isZero()
    {
        return $this->value === 0;
    }

    public function lowerThan(Speed $expectedSpeed)
    {
        return $this->value < $expectedSpeed->value;
    }

    public function greaterThan(Speed $expectedSpeed)
    {
        return $this->value > $expectedSpeed->value;
    }

    public function decreaseByTimes(int $times)
    {
        $this->value = $this->value / $times;
        return $this;
    }

    public function increaseByTimes(int $times)
    {
        $this->value = $this->value * $times;
        return $this;
    }

}