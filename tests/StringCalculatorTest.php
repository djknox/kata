<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    public function itEvaluatesAnEmptyStringAs0()
    {
        //  Given
        $calculator = new StringCalculator();

        //  When / Then
        $this->assertSame(0, $calculator->add(''));
    }

    /** @test */
    public function itFindsTheSumOfASingleNumber()
    {
        //  Given
        $calculator = new StringCalculator();

        //  When / Then
        $this->assertSame(5, $calculator->add('5'));
    }

    /** @test */
    public function itFindsTheSumOfTwoNumbers()
    {
        //  Given
        $calculator = new StringCalculator();

        //  When / Then
        $this->assertSame(10, $calculator->add('5, 5'));
    }

    /** @test */
    public function itFindsTheSumOfAnyAmountOfNumbers()
    {
        //  Given
        $calculator = new StringCalculator();

        //  When / Then
        $this->assertSame(29, $calculator->add('5, 5, 11, 8'));
    }

    /** @test */
    public function itAcceptsANewLineAsADelimiter()
    {
        //  Given
        $calculator = new StringCalculator();

        //  When / Then
        $this->assertSame(10, $calculator->add("5\n5"));
    }

    /** @test */
    public function itThrowsAnExceptionForNegativeNumbers()
    {
        //  Given
        $calculator = new StringCalculator();

        //  When / Then
        $this->expectException(\Exception::class);
        $calculator->add('5, -4');
    }

    /** @test */
    public function itIgnoresNumbersGreaterThan1000()
    {
        //  Given
        $calculator = new StringCalculator();

        //  When / Then
        $this->assertSame(5, $calculator->add('5, 1001'));
    }

    /** @test */
    public function itSupportsCustomDelimiters()
    {
        //  Given
        $calculator = new StringCalculator();

        //  When / Then
        $this->assertSame(10, $calculator->add("//:\n5:5"));
    }
}