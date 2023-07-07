<?php

namespace App;

class BowlingGame
{
    const FRAMES_PER_GAME = 10;
    protected array $rolls = [];

    protected function pinCount(int $roll): int
    {
        return $this->rolls[$roll];
    }

    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }

    public function score(): int
    {
        $score = 0;
        $roll = 0;

        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {
            if ($this->isStrike($roll)) {
                $score += $this->pinCount($roll);
                $score += $this->strikeBonus($roll);

                $roll += 1;

                continue;
            }

            if ($this->isSpare($roll)) {
                $score += $this->defaultFrameScore($roll);
                $score += $this->spareBonus($roll);
                $roll += 2;

                continue;
            }

            $score += $this->defaultFrameScore($roll);
            $roll += 2;
        }

        return $score;
    }

    public function isStrike(int $roll): bool
    {
        return $this->pinCount($roll) === 10;
    }

    public function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) === 10;
    }

    public function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }

    public function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }

    public function spareBonus(int $roll): int
    {
        return $this->pinCount($roll + 2);
    }
}