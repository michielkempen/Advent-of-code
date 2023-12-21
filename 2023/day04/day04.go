package day04

import (
	"strconv"
	"strings"
)

func Day04Part1(input string) int {
	var sum int

	for _, line := range strings.Split(input, "\n") {
		numbersInput := strings.Split(strings.Split(line, ": ")[1], " | ")

		winningNumbers := transformStringOfNumbersIntoArrayOfIntegers(numbersInput[0])
		myNumbers := transformStringOfNumbersIntoArrayOfIntegers(numbersInput[1])

		points := 0

		for _, myNumber := range myNumbers {
			for _, winningNumber := range winningNumbers {
				if myNumber == winningNumber {
					if points == 0 {
						points = 1
					} else {
						points *= 2
					}
				}
			}
		}

		sum += points
	}

	return sum
}

func transformStringOfNumbersIntoArrayOfIntegers(numbersInput string) []int {
	var numbers []int
	for _, asciiNumber := range strings.Split(numbersInput, " ") {
		if asciiNumber == "" {
			continue
		}
		number, _ := strconv.Atoi(asciiNumber)
		numbers = append(numbers, number)
	}
	return numbers
}
