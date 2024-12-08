<?php

namespace AdventOfCode\Y2024\D02;

use Illuminate\Support\Collection;

class D02
{
    public function getNumberOfSafeReports(Collection $reports): int
    {
        return $reports
            ->filter(fn (Collection $report) => $this->reportIsSafe($report))
            ->count();
    }

    public function getNumberOfSafeReportsWithProblemDampener(Collection $reports): int
    {
        return $reports
            ->filter(function (Collection $report) {
                return $this
                    ->generateProblemDampenedReports($report)
                    ->contains(fn (Collection $report) => $this->reportIsSafe($report));
            })
            ->count();
    }

    private function reportIsSafe(Collection $report): bool
    {
        return $this->levelsAreGraduallyIncreasing($report)
            || $this->levelsAreGraduallyDecreasing($report);
    }

    private function levelsAreGraduallyIncreasing(Collection $report): bool
    {
        return $report->reduce(
            function (bool $result, int $level, int $index) use ($report) {
                if (! $result) {
                    return false;
                }

                if ($index === 0) {
                    return true;
                }

                $previousLevel = $report[$index - 1];

                $increase = $level - $previousLevel;

                return $increase >= 1 && $increase <= 3;
            },
            true
        );
    }

    private function levelsAreGraduallyDecreasing(Collection $report): bool
    {
        return $this->levelsAreGraduallyIncreasing($report->reverse()->values());
    }

    private function generateProblemDampenedReports(Collection $report): Collection
    {
        return $report->map(function (int $level, int $index) use ($report) {
            return (clone $report)->forget($index)->values();
        });
    }
}
