<?php

use App\TennisMatch\Player;
use App\TennisMatch\TennisMatch;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    public function scores()
    {
        return [
            [0, 0, 'love-love'],
            [1, 0, 'fifteen-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 0, 'thirty-love'],
            [2, 2, 'thirty-thirty'],
            [3, 0, 'forty-love'],
            [4, 0, 'Winner: John McEnroe'],
            [3, 3, 'deuce'],
            [4, 3, 'Advantage: John McEnroe'],
            [3, 4, 'Advantage: Roger Federer'],
            [0, 4, 'Winner: Roger Federer'],
            [4, 4, 'deuce'],
            [5, 4, 'Advantage: John McEnroe'],
            [4, 5, 'Advantage: Roger Federer'],
            [5, 5, 'deuce'],
            [6, 5, 'Advantage: John McEnroe'],
            [5, 6, 'Advantage: Roger Federer'],
            [7, 5, 'Winner: John McEnroe'],
        ];
    }

    /**
     * @test
     * @dataProvider scores
     */
    public function itScoresATennisMatchMatch($playerOnePoints, $playerTwoPoints, $score)
    {
        //  Given
        $match = new TennisMatch(
            new Player('John McEnroe'),
            new Player('Roger Federer')
        );

        for ($i = 0; $i < $playerOnePoints; $i++) {
            $match->playerOne->addPoint();
        }

        for ($i = 0; $i < $playerTwoPoints; $i++) {
            $match->playerTwo->addPoint();
        }

        //  When / Then
        $this->assertSame($score, $match->score());
    }
}