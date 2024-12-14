<?php

namespace AdventOfCode\Y2024\D05;

use const PHP_EOL;

use function explode;

function readInput(string $filename): array
{
    $parts = explode(PHP_EOL.PHP_EOL, file_get_contents($filename));

    $pageOrderingRules = collect(explode(PHP_EOL, $parts[0]))
        ->map(function (string $pageOrderingRule) {
            return collect(explode('|', $pageOrderingRule))
                ->map(fn (string $pageNumber) => intval($pageNumber));
        });

    $updates = collect(explode(PHP_EOL, $parts[1]))
        ->map(function (string $update) {
            return collect(explode(',', $update))
                ->map(fn (string $pageNumber) => intval($pageNumber));
        });

    return [$pageOrderingRules, $updates];
}

test('part 1: test input', function () {
    [$pageOrderingRules, $updates] = readInput(__DIR__.'/test-input.txt');

    $number = (new D05)->sumMiddlePageNumberOfCorrectlyOrderedUpdates($updates, $pageOrderingRules);

    expect($number)->toBe(143);
});

test('part 1: input', function () {
    [$pageOrderingRules, $updates] = readInput(__DIR__.'/input.txt');

    $number = (new D05)->sumMiddlePageNumberOfCorrectlyOrderedUpdates($updates, $pageOrderingRules);

    expect($number)->toBe(4185);
});

test('part 2: test input', function () {
    [$pageOrderingRules, $updates] = readInput(__DIR__.'/test-input.txt');

    $number = (new D05)->sumMiddlePageNumberOfIncorrectlyOrderedUpdates($updates, $pageOrderingRules);

    expect($number)->toBe(123);
});

test('part 2: input', function () {
    [$pageOrderingRules, $updates] = readInput(__DIR__.'/input.txt');

    $number = (new D05)->sumMiddlePageNumberOfIncorrectlyOrderedUpdates($updates, $pageOrderingRules);

    expect($number)->toBe(4480);
});
