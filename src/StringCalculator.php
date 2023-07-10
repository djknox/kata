<?php

namespace App;

use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    protected string $delimiter = ",|\n";

    /**
     * @throws Exception
     */
    public function add(string $numbers): int
    {
        $numbers = $this->parseString($numbers);

        $numbers = $this
            ->checkForNegativeNumbers($numbers)
            ->ignoreNumbersGreaterThan1000($numbers);

        return array_sum($numbers);
    }

    protected function parseString(string $numbers): array
    {
        $customDelimiter = '\/\/(.)\n';

        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];
            $numbers = str_replace($matches[0], '', $numbers);
        }

        $numbers = preg_split("/{$this->delimiter}/", $numbers);

        return array_map('intval', $numbers);
    }

    /**
     * @throws Exception
     */
    public function checkForNegativeNumbers(array $numbers): static
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negatives not allowed');
            }
        }

        return $this;
    }

    public function ignoreNumbersGreaterThan1000(array $numbers): array
    {
        return array_filter($numbers, fn($number) => $number <= self::MAX_NUMBER_ALLOWED);
    }
}
