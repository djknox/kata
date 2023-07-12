<?php

namespace App;

class FizzBuzz
{
    public static function generate(int $number): int|string
    {
        $response = '';

        if ($number % 3 === 0) {
            $response .= 'Fizz';
        }

        if ($number % 5 === 0) {
            $response .= 'Buzz';
        }

        return $response ?: $number;
    }
}