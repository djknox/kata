<?php

namespace App;

class NinetyNineBottles
{
    protected int $beers = 99;

    public function sing(): array
    {
        $lyrics = [];

        for ($i = $this->beers; $i >= 0; $i--) {
            if ($this->beers > 0) {
                $lyrics[] = "{$this->beers} {$this->bottleOrBottles()} of beer on the wall, {$this->beers} {$this->bottleOrBottles()} of beer. Take one down and pass it around, {$this->takeOneDown()} {$this->bottleOrBottles()} of beer on the wall.";
            }

            if ($this->beers === 0) {
                $lyrics[] = "No more {$this->bottleOrBottles()} of beer on the wall, no more {$this->bottleOrBottles()} of beer. Go to the store and buy some more, {$this->takeOneDown()} {$this->bottleOrBottles()} of beer on the wall.";
            }
        }

        return $lyrics;
    }

    protected function takeOneDown(): int|string
    {
        $this->beers -= 1;

        if ($this->beers > 0) {
            return $this->beers;
        }

        if ($this->beers === -1) {
            return $this->beers = 99;
        }

        return 'no more';
    }

    protected function bottleOrBottles(): string
    {
        return $this->beers === 1 ? 'bottle' : 'bottles';
    }
}