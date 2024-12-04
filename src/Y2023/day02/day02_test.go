package day02

import (
	"os"
	"testing"
)

func Test1Part1(t *testing.T) {
	input := `Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green`

	sum := Day02Part1(input, Cubes{12, 13, 14})

	if sum != 8 {
		t.Errorf("The sum should be 8, got = %d.", sum)
	}
}

func Test2Part1(t *testing.T) {
	file, _ := os.ReadFile("./input.txt")
	input := string(file)

	sum := Day02Part1(input, Cubes{12, 13, 14})

	if sum != 3099 {
		t.Errorf("The sum should be 3099, got = %d.", sum)
	}
}

func Test1Part2(t *testing.T) {
	input := `Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green`

	sum := Day02Part2(input)

	if sum != 2286 {
		t.Errorf("The sum should be 2286, got = %d.", sum)
	}
}

func Test2Part2(t *testing.T) {
	file, _ := os.ReadFile("./input.txt")
	input := string(file)

	sum := Day02Part2(input)

	if sum != 72970 {
		t.Errorf("The sum should be 72970, got = %d.", sum)
	}
}
