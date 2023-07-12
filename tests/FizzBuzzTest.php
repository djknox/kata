<?php

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function numbers(): array
    {
        return [
            [1, 1],
            [2, 2],
            [3, 'Fizz'],
            [4, 4],
            [5, 'Buzz'],
            [6, 'Fizz'],
            [7, 7],
            [8, 8],
            [9, 'Fizz'],
            [10, 'Buzz'],
            [11, 11],
            [12, 'Fizz'],
            [13, 13],
            [14, 14],
            [15, 'FizzBuzz'],
            [30, 'FizzBuzz'],
            [45, 'FizzBuzz'],
            [60, 'FizzBuzz'],
        ];
    }

    /**
     * @test
     * @dataProvider numbers
     */
    public function itReturnsFizzBuzz($number, $response)
    {
        //  Given / When / Then
        $this->assertSame($response, FizzBuzz::generate($number));
    }


    /** @test */
    public function itReturnsFizzForMultiplesOfThree()
    {
        //  Given / When / Then
        $this->assertSame('Fizz', FizzBuzz::generate(3));
    }

    /** @test */
    public function itReturnsBuzzForMultiplesOfFive()
    {
        //  Given / When / Then
        $this->assertSame('Buzz', FizzBuzz::generate(5));
    }

    /** @test */
    public function itReturnsFizzBuzzForMultiplesOfThreeAndFive()
    {
        //  Given / When / Then
        $this->assertSame('FizzBuzz', FizzBuzz::generate(15));
    }
}