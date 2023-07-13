<?php

namespace App\GildedRose\Items;

class ConjuredManaCake extends Item
{
    public function tick(): void
    {
        $this->quality -= 2;

        if ($this->sellIn <= 0) {
            $this->quality -= 2;
        }

        $this->sellIn -= 1;
        $this->resetQuality();
    }
}