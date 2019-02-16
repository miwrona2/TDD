<?php

namespace App;

class Speed {
    const UNIT = 'km/h';
    public $value;

    public function isZero()
    {
        return $this->value === 0;
    }

    public function lowerThan(Speed $expectedSpeed): bool
    {
        return $this->value < $expectedSpeed->value;
    }

    public function greaterThan(Speed $expectedSpeed): bool
    {
        return $this->value > $expectedSpeed->value;
    }

    public function decreaseByTimes(int $times): Speed
    {
        $this->value = $this->value / $times;
        return $this;
    }

    public function increaseByTimes(int $times): Speed
    {
        $this->value = $this->value * $times;
        return $this;
    }

}