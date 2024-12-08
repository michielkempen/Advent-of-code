<?php

namespace AdventOfCode\Y2024\D01;

use Illuminate\Support\Collection;

class D01
{
    public function calculateDifferenceBetweenLists(Collection $list1, Collection $list2): int
    {
        $sortedList1 = $list1->sort()->values();
        $sortedList2 = $list2->sort()->values();

        return $sortedList1->reduce(
            fn (int $result, int $number, int $index) => $result + abs($number - $sortedList2->get($index)),
            0
        );
    }

    public function calculateSimilarityBetweenLists(Collection $list1, Collection $list2): int
    {
        $list2CountsPerNumber = $list2->countBy();

        return $list1->sum(fn (int $number) => $number * $list2CountsPerNumber->get($number, 0));
    }
}
