<?php

namespace AdventOfCode\Y2024\D03;

class D03
{
    public function computeMultiplication(string $input): int
    {
        $result = 0;

        $matches = [];
        preg_match_all('/(mul\(\d+,\d+\))/', $input, $matches);

        foreach ($matches[0] as $match) {
            $result += $this->resolveMultiplication($match);
        }

        return $result;
    }

    public function computeMultiplicationWithConditionals(string $input): int
    {
        $result = 0;
        $multiplicationsEnabled = true;

        $matches = [];
        preg_match_all('/(mul\(\d+,\d+\))|(do\(\))|(don\'t\(\))/', $input, $matches);

        foreach ($matches[0] as $match) {
            if ($match === 'do()') {
                $multiplicationsEnabled = true;

                continue;
            }
            if ($match === 'don\'t()') {
                $multiplicationsEnabled = false;

                continue;
            }
            if ($multiplicationsEnabled) {
                $result += $this->resolveMultiplication($match);
            }
        }

        return $result;
    }

    private function resolveMultiplication(string $expression): int
    {
        $numbers = [];
        preg_match('/mul\((\d+),(\d+)\)/', $expression, $numbers);

        return intval($numbers[1]) * intval($numbers[2]);
    }
}
