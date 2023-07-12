<?php

use App\NinetyNineBottles;
use PHPUnit\Framework\TestCase;

class NinetyNineBottlesTest extends TestCase
{
    /** @test */
    public function itSingsTheFirstLyricOfTheSong()
    {
        //  Given
        $singer = new NinetyNineBottles();

        // When / Then
        $this->assertSame(
            '99 bottles of beer on the wall, 99 bottles of beer. Take one down and pass it around, 98 bottles of beer on the wall.',
            $singer->sing()[0]
        );
    }

    /** @test */
    public function itSingsTheSecondLyricOfTheSong()
    {
        //  Given
        $singer = new NinetyNineBottles();

        // When / Then
        $this->assertSame(
            '98 bottles of beer on the wall, 98 bottles of beer. Take one down and pass it around, 97 bottles of beer on the wall.',
            $singer->sing()[1]
        );
    }

    /** @test */
    public function itSingsTheThirdLyricOfTheSong()
    {
        //  Given
        $singer = new NinetyNineBottles();

        // When / Then
        $this->assertSame(
            '97 bottles of beer on the wall, 97 bottles of beer. Take one down and pass it around, 96 bottles of beer on the wall.',
            $singer->sing()[2]
        );
    }

    /** @test */
    public function itSingsTheThirdToLastLyricOfTheSong()
    {
        //  Given
        $singer = new NinetyNineBottles();

        // When / Then
        $this->assertSame(
            '2 bottles of beer on the wall, 2 bottles of beer. Take one down and pass it around, 1 bottle of beer on the wall.',
            $singer->sing()[97]
        );
    }

    /** @test */
    public function itSingsThePenultimateLyricOfTheSong()
    {
        //  Given
        $singer = new NinetyNineBottles();

        // When / Then
        $this->assertSame(
            '1 bottle of beer on the wall, 1 bottle of beer. Take one down and pass it around, no more bottles of beer on the wall.',
            $singer->sing()[98]
        );
    }

    /** @test */
    public function itSingsTheFinalLyricOfTheSong()
    {
        //  Given
        $singer = new NinetyNineBottles();

        // When / Then
        $this->assertSame(
            'No more bottles of beer on the wall, no more bottles of beer. Go to the store and buy some more, 99 bottles of beer on the wall.',
            $singer->sing()[99]
        );
    }
}