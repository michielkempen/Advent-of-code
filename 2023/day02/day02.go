package day02

import (
	"strconv"
	"strings"
)

type Cubes struct {
	red   int
	green int
	blue  int
}

func Day02Part1(input string, availableCubes Cubes) int {
	var sum int

	for _, line := range strings.Split(input, "\n") {
		gameInfo := strings.Split(line, ": ")
		if gameIsPossible(gameInfo[1], availableCubes) {
			sum += parseGameNumber(gameInfo[0])
		}
	}

	return sum
}

func Day02Part2(input string) int {
	var sum int

	for _, line := range strings.Split(input, "\n") {
		gameInfo := strings.Split(line, ": ")
		sum += calculatePower(gameInfo[1])
	}

	return sum
}

func parseGameNumber(line string) int {
	gameNumber, _ := strconv.Atoi(line[5:])
	return gameNumber
}

func gameIsPossible(sets string, availableCubes Cubes) bool {
	for _, set := range strings.Split(sets, "; ") {
		for _, cube := range strings.Split(set, ", ") {
			cubeInfo := strings.Split(cube, " ")
			cubeCount, _ := strconv.Atoi(cubeInfo[0])
			cubeColor := cubeInfo[1]

			if cubeColor == "red" && cubeCount > availableCubes.red {
				return false
			}
			if cubeColor == "green" && cubeCount > availableCubes.green {
				return false
			}
			if cubeColor == "blue" && cubeCount > availableCubes.blue {
				return false
			}
		}
	}

	return true
}

func calculatePower(sets string) int {
	cubes := Cubes{0, 0, 0}

	for _, set := range strings.Split(sets, "; ") {
		for _, cube := range strings.Split(set, ", ") {
			cubeInfo := strings.Split(cube, " ")
			cubeCount, _ := strconv.Atoi(cubeInfo[0])
			cubeColor := cubeInfo[1]

			if cubeColor == "red" && cubeCount > cubes.red {
				cubes.red = cubeCount
			}
			if cubeColor == "green" && cubeCount > cubes.green {
				cubes.green = cubeCount
			}
			if cubeColor == "blue" && cubeCount > cubes.blue {
				cubes.blue = cubeCount
			}
		}

	}

	return cubes.red * cubes.blue * cubes.green
}
