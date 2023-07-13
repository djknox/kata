<?php

namespace App\GildedRose\Items;

class BackstagePass extends Item
{
    public function tick(): void
    {
        $this->quality += 1;

        if ($this->sellIn <= 10) {
            $this->quality += 1;
        }
        if ($this->sellIn <= 5) {
            $this->quality += 1;
        }
        if ($this->sellIn <= 0) {
            $this->quality = 0;
        }

        $this->sellIn -= 1;
        $this->resetQuality();
    }
}