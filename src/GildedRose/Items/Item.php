<?php

namespace App\GildedRose\Items;

class Item
{
    public function __construct(public int $quality, public int $sellIn) {}

    public function tick(): void
    {
        $this->quality -= 1;

        if ($this->sellIn <= 0) {
            $this->quality -= 1;
        }

        $this->sellIn -= 1;
        $this->resetQuality();
    }

    protected function resetQuality(): void
    {
        if ($this->quality < 0) {
            $this->quality = 0;
        }

        if ($this->quality >= 50) {
            $this->quality = 50;
        }
    }
}