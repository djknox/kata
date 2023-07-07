<?php

use App\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    /** @test */
    public function itScoresAGutterGameAsZero()
    {
        //  Given
        $game = new BowlingGame();

        //  When
        foreach (range(1, 20) as $roll) {
            $game->roll(0);
        }

        //  Then
        $this->assertSame(0, $game->score());
    }

    /** @test */
    public function itScoresAllOnesAsTwenty()
    {
        //  Given
        $game = new BowlingGame();

        //  When
        foreach (range(1, 20) as $roll) {
            $game->roll(1);
        }

        //  Then
        $this->assertSame(20, $game->score());
    }

    /** @test */
    public function itAwardsAOneRollBonusForEverySpare()
    {
        //  Given
        $game = new BowlingGame();
        $game->roll(5);
        $game->roll(5);

        //  When
        $game->roll(8);

        foreach (range(1, 17) as $roll) {
            $game->roll(0);
        }

        //  Then
        $this->assertSame(26, $game->score());
    }

    /** @test */
    public function itAwardsATwoRollBonusForEveryStrike()
    {
        //  Given
        $game = new BowlingGame();
        $game->roll(10);

        //  When
        $game->roll(5);
        $game->roll(2);

        foreach (range(1, 17) as $roll) {
            $game->roll(0);
        }

        //  Then
        $this->assertSame(24, $game->score());
    }

    /** @test */
    public function aSpareOnTheFinalFrameGrantsOneExtraRoll()
    {
        //  Given
        $game = new BowlingGame();
        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }

        //  When
        $game->roll(5);
        $game->roll(5);

        $game->roll(5);

        foreach (range(1, 16) as $roll) {
            $game->roll(0);
        }

        //  Then
        $this->assertSame(15, $game->score());
    }

    /** @test */
    public function aStrikeOnTheFinalFrameGrantsTwoExtraRolls()
    {
        //  Given
        $game = new BowlingGame();
        foreach (range(1, 18) as $roll) {
            $game->roll(0);
        }

        //  When
        $game->roll(10);

        $game->roll(10);
        $game->roll(10);

        //  Then
        $this->assertSame(30, $game->score());
    }

    /** @test */
    public function itScoresAPerfectGame()
    {
        //  Given
        $game = new BowlingGame();

        //  When
        foreach (range(1, 12) as $roll) {
            $game->roll(10);
        }

        //  Then
        $this->assertSame(300, $game->score());
    }
}