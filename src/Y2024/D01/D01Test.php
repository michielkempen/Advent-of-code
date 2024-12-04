<?php

namespace AdventOfCode\Y2024\D01;

function readInput(string $filename): array
{
    return collect(explode(PHP_EOL, file_get_contents($filename)))->reduce(
        function(array $lists, string $line) {
            $numbers = explode('   ', $line);

            $lists[0]->push(intval($numbers[0]));
            $lists[1]->push(intval($numbers[1]));

            return $lists;
        },
        [collect(), collect()]
    );
}

test('part 1: test input', function() {
    [$list1, $list2] = readInput(__DIR__.'/test-input.txt');

    $difference = (new D01)->calculateDifferenceBetweenLists($list1, $list2);

    expect($difference)->toBe(11);
});

test('part 1: input', function() {
    [$list1, $list2] = readInput(__DIR__.'/input.txt');

    $difference = (new D01)->calculateDifferenceBetweenLists($list1, $list2);

    expect($difference)->toBe(1189304);
});

test('part 2: test input', function() {
    [$list1, $list2] = readInput(__DIR__.'/test-input.txt');

    $difference = (new D01)->calculateSimilarityBetweenLists($list1, $list2);

    expect($difference)->toBe(31);
});

test('part 2: input', function() {
    [$list1, $list2] = readInput(__DIR__.'/input.txt');

    $difference = (new D01)->calculateSimilarityBetweenLists($list1, $list2);

    expect($difference)->toBe(24349736);
});