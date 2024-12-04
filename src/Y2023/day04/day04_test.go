package day04

import (
	"os"
	"testing"
)

func Test1Part1(t *testing.T) {
	input := `Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53
Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19
Card 3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1
Card 4: 41 92 73 84 69 | 59 84 76 51 58  5 54 83
Card 5: 87 83 26 28 32 | 88 30 70 12 93 22 82 36
Card 6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11`

	sum := Day04Part1(input)

	if sum != 13 {
		t.Errorf("The sum should be 13, got = %d.", sum)
	}
}

func Test2Part1(t *testing.T) {
	file, _ := os.ReadFile("./input.txt")
	input := string(file)

	sum := Day04Part1(input)

	if sum != 21213 {
		t.Errorf("The sum should be 21213, got = %d.", sum)
	}
}

func Test1Part2(t *testing.T) {
	input := `Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53
Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19
Card 3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1
Card 4: 41 92 73 84 69 | 59 84 76 51 58  5 54 83
Card 5: 87 83 26 28 32 | 88 30 70 12 93 22 82 36
Card 6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11`

	sum := Day04Part2(input)

	if sum != 30 {
		t.Errorf("The sum should be 30, got = %d.", sum)
	}
}
