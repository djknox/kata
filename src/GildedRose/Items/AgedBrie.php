<?php

namespace App\GildedRose\Items;

class AgedBrie extends Item
{
    public function tick(): void
    {
        $this->quality += 1;

        if ($this->sellIn <= 0) {
            $this->quality += 1;
        }

        $this->sellIn -= 1;
        $this->resetQuality();
    }
}