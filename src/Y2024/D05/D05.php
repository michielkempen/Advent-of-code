<?php

namespace AdventOfCode\Y2024\D05;

use Illuminate\Support\Collection;

class D05
{
    public function sumMiddlePageNumberOfCorrectlyOrderedUpdates(
        Collection $updates, Collection $pageOrderingRules
    ): int {
        return $updates
            ->filter(fn (Collection $update) => $this->updateIsOrderedCorrectly($update, $pageOrderingRules))
            ->map(fn (Collection $update) => $this->getMiddlePageNumber($update))
            ->sum();
    }

    public function sumMiddlePageNumberOfIncorrectlyOrderedUpdates(
        Collection $updates, Collection $pageOrderingRules
    ): int {
        return $updates
            ->filter(fn (Collection $update) => ! $this->updateIsOrderedCorrectly($update, $pageOrderingRules))
            ->map(fn (Collection $update) => $this->orderUpdate($update, $pageOrderingRules))
            ->map(fn (Collection $update) => $this->getMiddlePageNumber($update))
            ->sum();
    }

    private function updateIsOrderedCorrectly(Collection $update, Collection $pageOrderingRules): bool
    {
        return $update->every(function (int $pageNumber, int $index) use ($update, $pageOrderingRules) {
            return $this
                ->getNumbersThatShouldNotOccurBeforePageNumber($pageOrderingRules, $pageNumber)
                ->every(fn (int $number) => ! $this->numberOccursInUpdateBeforeIndex($number, $update, $index));
        });
    }

    private function getNumbersThatShouldNotOccurBeforePageNumber(
        Collection $pageOrderingRules, int $pageNumber
    ): Collection {
        return $pageOrderingRules->where(0, '=', $pageNumber)->pluck(1);
    }

    private function numberOccursInUpdateBeforeIndex(int $number, Collection $update, int $i): bool
    {
        return $update->slice(0, $i)->contains($number);
    }

    private function getMiddlePageNumber(Collection $update): int
    {
        return $update[floor(count($update) / 2)];
    }

    private function orderUpdate(Collection $update, Collection $pageOrderingRules): Collection
    {
        return $update
            ->sort(function (int $a, int $b) use ($pageOrderingRules) {
                foreach ($pageOrderingRules as $rule) {
                    $number1 = $rule[0];
                    $number2 = $rule[1];

                    if ($a === $number1 && $b === $number2) {
                        return -1;
                    }

                    if ($a === $number2 && $b === $number1) {
                        return 1;
                    }
                }

                return 0;
            })
            ->values();
    }
}
