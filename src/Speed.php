<?php

namespace App;

class Speed {
    const UNIT = 'km/h';
    public $value;

    public function isZero()
    {
        return $this->value === 0;
    }

}