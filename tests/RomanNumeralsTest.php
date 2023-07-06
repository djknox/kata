<?php

use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    public function checks()
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [9, 'IX'],
            [10, 'X'],
            [20, 'XX'],
            [30, 'XXX'],
            [40, 'XL'],
            [50, 'L'],
            [90, 'XC'],
            [100, 'C'],
            [200, 'CC'],
            [300, 'CCC'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M'],
            [1994, 'MCMXCIV'],
            [2000, 'MM'],
            [3000, 'MMM'],
            [3999, 'MMMCMXCIX'],
        ];
    }

    /**
     * @test
     * @dataProvider checks
     */
    public function itGeneratesTheRomanNumeralFor1($number, $numeral)
    {
        //  Given / When / Then
        $this->assertEquals($numeral, RomanNumerals::generate($number));
    }

    /** @test */
    public function itCannotGenerateARomanNumeralForLessThan1()
    {
        //  Given / When / Then
        $this->assertFalse(RomanNumerals::generate(0));
    }

    /** @test */
    public function itCannotGenerateARomanNumeralForMoreThan3999()
    {
        //  Given / When / Then
        $this->assertFalse(RomanNumerals::generate(4000));
    }
}

