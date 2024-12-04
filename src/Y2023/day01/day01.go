package day01

import (
	"strings"
	"unicode"
)

type asciiNumber struct {
	ascii   string
	integer int
	index   int
}

func Day01Part1(input string) int {
	var sum int

	for _, line := range strings.Split(input, "\n") {
		var firstNumber *int
		var lastNumber int

		for _, character := range line {
			if number := findNumber(rune(character)); number != nil {
				if firstNumber == nil {
					firstNumber = new(int)
					*firstNumber = *number
				}

				lastNumber = *number
			}
		}

		sum += *firstNumber*10 + lastNumber
	}

	return sum
}

func Day01Part2(input string) int {
	var sum int
	var asciiNumberMap = []asciiNumber{
		{"one", 1, 0},
		{"two", 2, 0},
		{"three", 3, 0},
		{"four", 4, 0},
		{"five", 5, 0},
		{"six", 6, 0},
		{"seven", 7, 0},
		{"eight", 8, 0},
		{"nine", 9, 0},
	}

	for _, line := range strings.Split(input, "\n") {
		var firstNumber *int
		var lastNumber int

		for _, character := range line {
			if number := findNumberIncludingAscii(rune(character), &asciiNumberMap); number != nil {
				if firstNumber == nil {
					firstNumber = new(int)
					*firstNumber = *number
				}

				lastNumber = *number
			}
		}

		sum += *firstNumber*10 + lastNumber

		resetAsciiNumberMap(&asciiNumberMap)
	}

	return sum
}

func findNumber(character rune) *int {
	var number *int

	if unicode.IsNumber(character) {
		number = new(int)
		*number = int(character - '0')
		return number
	}

	return number
}

func findNumberIncludingAscii(character rune, asciiNumberMap *[]asciiNumber) *int {
	var number *int

	if unicode.IsNumber(character) {
		number = new(int)
		*number = int(character - '0')
		resetAsciiNumberMap(asciiNumberMap)
		return number
	}

	for j := 0; j < len(*asciiNumberMap); j++ {
		a := &(*asciiNumberMap)[j]

		if character == rune(a.ascii[a.index]) {
			a.index++
		} else if character == rune(a.ascii[0]) {
			a.index = 1
		} else {
			a.index = 0
		}

		if a.index == len(a.ascii) {
			number = new(int)
			*number = a.integer
			a.index = 0
		}
	}

	return number
}

func resetAsciiNumberMap(asciiNumberMap *[]asciiNumber) {
	for j := 0; j < len(*asciiNumberMap); j++ {
		a := &(*asciiNumberMap)[j]
		a.index = 0
	}
}
