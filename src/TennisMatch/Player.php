<?php

namespace App\TennisMatch;

class Player
{
    public int $points = 0;

    public function __construct(public string $name) {}

    public function addPoint(): void
    {
        $this->points++;
    }

    public function score(): string
    {
        switch($this->points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
        }
    }
}