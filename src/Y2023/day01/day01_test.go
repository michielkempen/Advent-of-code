package day01

import (
	"os"
	"testing"
)

func Test1Part1(t *testing.T) {
	input := `1abc2
pqr3stu8vwx
a1b2c3d4e5f
treb7uchet`

	// 12 + 38 + 15 + 77 = 142
	sum := Day01Part1(input)

	if sum != 142 {
		t.Errorf("The sum should be 142, got = %d.", sum)
	}
}

func Test2Part1(t *testing.T) {
	file, _ := os.ReadFile("./input.txt")
	input := string(file)

	sum2 := Day01Part1(input)

	if sum2 != 53921 {
		t.Errorf("The sum should be 53921, got = %d.", sum2)
	}
}

func Test1Part2(t *testing.T) {
	input := `two1nine
eightwothree
abcone2threexyz
xtwone3four
4nineeightseven2
zoneight234
7pqrstsixteen`

	// 29 + 83 + 13 + 24 + 42 + 14 + 76 = 281
	sum := Day01Part2(input)

	if sum != 281 {
		t.Errorf("The sum should be 281, got = %d.", sum)
	}
}

func Test2Part2(t *testing.T) {
	input := `eightnine2eightnineeight`

	sum := Day01Part2(input)

	if sum != 88 {
		t.Errorf("The sum should be 88, got = %d.", sum)
	}
}

func Test3Part2(t *testing.T) {
	file, _ := os.ReadFile("./input.txt")
	input := string(file)

	sum := Day01Part2(input)

	if sum != 54676 {
		t.Errorf("The sum should be 54676, got = %d.", sum)
	}
}

func BenchmarkPart1(b *testing.B) {
	file, _ := os.ReadFile("./input.txt")
	input := string(file)

	Day01Part1(input)
}

func BenchmarkPart2(b *testing.B) {
	file, _ := os.ReadFile("./input.txt")
	input := string(file)

	Day01Part2(input)
}
