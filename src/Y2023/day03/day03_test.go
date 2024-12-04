package day03

import (
	"os"
	"testing"
)

func Test1Part1(t *testing.T) {
	input := `467..114..
...*......
..35..633.
......#...
617*......
.....+.58.
..592.....
......755.
...$.*....
.664.598..`

	sum := Day03Part1(input)

	if sum != 4361 {
		t.Errorf("The sum should be 4361, got = %d.", sum)
	}
}

func Test2Part1(t *testing.T) {
	file, _ := os.ReadFile("./input.txt")
	input := string(file)

	sum := Day03Part1(input)

	if sum != 535235 {
		t.Errorf("The sum should be 535235, got = %d.", sum)
	}
}

func Test1Part2(t *testing.T) {
	input := `467..114..
...*......
..35..633.
......#...
617*......
.....+.58.
..592.....
......755.
...$.*....
.664.598..`

	sum := Day03Part2(input)

	if sum != 467835 {
		t.Errorf("The sum should be 467835, got = %d.", sum)
	}
}

func Test2Part2(t *testing.T) {
	file, _ := os.ReadFile("./input.txt")
	input := string(file)

	sum := Day03Part2(input)

	if sum != 79844424 {
		t.Errorf("The sum should be 79844424, got = %d.", sum)
	}
}
