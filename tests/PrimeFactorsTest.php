<?php

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    public static function factors()
    {
        return [
            [1, []],
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [6, [2, 3]],
            [7, [7]],
            [8, [2, 2, 2]],
            [9, [3, 3]],
            [100, [2, 2, 5, 5]],
            [210, [2, 3, 5, 7]],
            [999, [3, 3, 3, 37]],
        ];
    }

    /**
     * @test
     * @dataProvider factors
     */
    public function itGeneratesPrimeFactors($number, $expected)
    {
        //  Given
        $factors = new PrimeFactors();

        //  When / Then
        $this->assertEquals($expected, $factors->generate($number));
    }
}