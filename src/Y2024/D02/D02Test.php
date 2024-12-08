<?php

namespace AdventOfCode\Y2024\D02;

use Illuminate\Support\Collection;

use function expect;

function readInput(string $filename): Collection
{
    return collect(explode(PHP_EOL, file_get_contents($filename)))
        ->map(fn (string $line) => collect(explode(' ', $line)));
}

test('part 1: test input', function () {
    $reports = readInput(__DIR__.'/test-input.txt');

    $number = (new D02)->getNumberOfSafeReports($reports);

    expect($number)->toBe(2);
});

test('part 1: input', function () {
    $reports = readInput(__DIR__.'/input.txt');

    $number = (new D02)->getNumberOfSafeReports($reports);

    expect($number)->toBe(218);
});

test('part 2: test input', function () {
    $reports = readInput(__DIR__.'/test-input.txt');

    $number = (new D02)->getNumberOfSafeReportsWithProblemDampener($reports);

    expect($number)->toBe(4);
});

test('part 2: input', function () {
    $reports = readInput(__DIR__.'/input.txt');

    $number = (new D02)->getNumberOfSafeReportsWithProblemDampener($reports);

    expect($number)->toBe(290);
});
