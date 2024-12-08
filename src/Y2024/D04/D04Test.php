<?php

namespace AdventOfCode\Y2024\D04;

function readInput(string $filename): array
{
    return collect(explode(PHP_EOL, file_get_contents($filename)))
        ->map(fn (string $line) => str_split($line))
        ->toArray();
}

test('part 1: test input', function () {
    $input = readInput(__DIR__.'/test-input.txt');

    $number = (new D04)->countXmasAppearances($input);

    expect($number)->toBe(18);
});

test('part 1: input', function () {
    $input = readInput(__DIR__.'/input.txt');

    $number = (new D04)->countXmasAppearances($input);

    expect($number)->toBe(2554);
});

test('part 2: test input', function () {
    $input = readInput(__DIR__.'/test-input.txt');

    $number = (new D04)->countXmasShapeAppearances($input);

    expect($number)->toBe(9);
});

test('part 2: input', function () {
    $input = readInput(__DIR__.'/input.txt');

    $number = (new D04)->countXmasShapeAppearances($input);

    expect($number)->toBe(1916);
});
