<?php

namespace App;


final class EngineSpeedSpy implements Engine
{
    public $speedIncreased;
    public $speedDecreased;

    public function __construct()
    {
        $this->speedDecreased = false;
        $this->speedIncreased = false;
    }

    public function speedUp(): void
    {
        $this->speedIncreased = true;
    }

    public function speedDown(): void
    {
        $this->speedDecreased = true;
    }
}