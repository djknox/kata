<?php

namespace App\TennisMatch;

class TennisMatch
{
    public function __construct(public Player $playerOne, public Player $playerTwo) {}

    public function score(): string
    {
        if ($this->hasWinner()) {
            return "Winner: {$this->leader()->name}";
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        if ($this->isAdvantage()) {
            return "Advantage: {$this->leader()->name}";
        }

        return sprintf(
            '%s-%s',
            $this->playerOne->score(),
            $this->playerTwo->score()
        );
    }

    protected function leader(): Player
    {
        return $this->playerOne->points > $this->playerTwo->points
            ? $this->playerOne
            : $this->playerTwo;
    }

    protected function hasWinner(): bool
    {
        return ($this->playerOne->points >= 4 && $this->playerOne->points >= $this->playerTwo->points + 2)
            || ($this->playerTwo->points >= 4 && $this->playerTwo->points >= $this->playerOne->points + 2);
    }

    protected function isDeuce(): bool
    {
        return $this->isGamePoint() && $this->playerOne->points === $this->playerTwo->points;
    }

    protected function isAdvantage(): bool
    {
        return $this->isGamePoint()
            && ($this->playerOne->points > $this->playerTwo->points
                || $this->playerTwo->points > $this->playerOne->points);
    }

    protected function isGamePoint(): bool
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }
}