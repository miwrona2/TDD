<?php
namespace App;

interface Engine {
    public function speedUp(): void;
    public function speedDown(): void;
}