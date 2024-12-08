<?php

namespace AdventOfCode\Y2024\D04;

class D04
{
    public function countXmasAppearances(array $grid): int
    {
        $result = 0;

        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid[$i]); $j++) {
                if ($grid[$i][$j] === 'X') {
                    $result += $this->countXmasAppearancesInNeighbourhood($grid, $i, $j);
                }
            }
        }

        return $result;
    }

    public function countXmasShapeAppearances(array $grid): int
    {
        $result = 0;

        for ($i = 0; $i < count($grid); $i++) {
            for ($j = 0; $j < count($grid[$i]); $j++) {
                if ($grid[$i][$j] === 'A') {
                    if ($this->isXmasShape($grid, $i, $j)) {
                        $result++;
                    }
                }
            }
        }

        return $result;
    }

    private function countXmasAppearancesInNeighbourhood(array $grid, int $i, int $j): int
    {
        $diagonalTopLeft = $this->getCharacter($grid, $i - 1, $j - 1).$this->getCharacter($grid, $i - 2, $j - 2).$this->getCharacter($grid, $i - 3, $j - 3);
        $top = $this->getCharacter($grid, $i - 1, $j).$this->getCharacter($grid, $i - 2, $j).$this->getCharacter($grid, $i - 3, $j);
        $diagonalTopRight = $this->getCharacter($grid, $i - 1, $j + 1).$this->getCharacter($grid, $i - 2, $j + 2).$this->getCharacter($grid, $i - 3, $j + 3);

        $left = $this->getCharacter($grid, $i, $j - 1).$this->getCharacter($grid, $i, $j - 2).$this->getCharacter($grid, $i, $j - 3);
        $right = $this->getCharacter($grid, $i, $j + 1).$this->getCharacter($grid, $i, $j + 2).$this->getCharacter($grid, $i, $j + 3);

        $diagonalBottomLeft = $this->getCharacter($grid, $i + 1, $j - 1).$this->getCharacter($grid, $i + 2, $j - 2).$this->getCharacter($grid, $i + 3, $j - 3);
        $bottom = $this->getCharacter($grid, $i + 1, $j).$this->getCharacter($grid, $i + 2, $j).$this->getCharacter($grid, $i + 3, $j);
        $diagonalBottomRight = $this->getCharacter($grid, $i + 1, $j + 1).$this->getCharacter($grid, $i + 2, $j + 2).$this->getCharacter($grid, $i + 3, $j + 3);

        return collect([$diagonalTopLeft, $top, $diagonalTopRight, $left, $right, $diagonalBottomLeft, $bottom, $diagonalBottomRight])
            ->filter(fn (string $word) => $word === 'MAS')
            ->count();
    }

    private function isXmasShape(array $grid, int $i, int $j): bool
    {
        $topLeft = $this->getCharacter($grid, $i - 1, $j - 1);
        $topRight = $this->getCharacter($grid, $i - 1, $j + 1);
        $bottomLeft = $this->getCharacter($grid, $i + 1, $j - 1);
        $bottomRight = $this->getCharacter($grid, $i + 1, $j + 1);

        $diagonal1 = $topLeft.'A'.$bottomRight;
        $diagonal2 = $topRight.'A'.$bottomLeft;

        return collect([$diagonal1, $diagonal2])
            ->filter(fn (string $word) => $word === 'MAS' || $word === 'SAM')
            ->count() === 2;
    }

    private function getCharacter(array $grid, int $i, int $j): string
    {
        if ($i < 0 || $j < 0 || $i >= count($grid) || $j >= count($grid[$i])) {
            return '';
        }

        return $grid[$i][$j];
    }
}
