<?php

namespace AdventOfCode\Y2024\D03;

use function expect;

function readInput(string $filename): string
{
    return file_get_contents($filename);
}

test('part 1: test input', function () {
    $input = readInput(__DIR__.'/test-input1.txt');

    $number = (new D03)->computeMultiplication($input);

    expect($number)->toBe(161);
});

test('part 1: input', function () {
    $input = readInput(__DIR__.'/input.txt');

    $number = (new D03)->computeMultiplication($input);

    expect($number)->toBe(175615763);
});

test('part 2: test input', function () {
    $input = readInput(__DIR__.'/test-input2.txt');

    $number = (new D03)->computeMultiplicationWithConditionals($input);

    expect($number)->toBe(48);
});

test('part 2: input', function () {
    $input = readInput(__DIR__.'/input.txt');

    $number = (new D03)->computeMultiplicationWithConditionals($input);

    expect($number)->toBe(74361272);
});
