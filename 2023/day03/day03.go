package day03

import (
	"slices"
	"strconv"
	"strings"
	"unicode"
)

type grid struct {
	cells [][]rune
	rows  int
	cols  int
}

type asciiNumber struct {
	characters string
	row        int
	startCol   int
	endCol     int
}

func Day03Part1(input string) int {
	grid := create2dGrid(input)
	asciiNumber := asciiNumber{"", 0, 0, 0}
	symbols := []rune{'+', '-', '*', '/', '#', '$', '%', '@', '=', '&'}
	sum := 0

	for row := 0; row < grid.rows; row++ {
		asciiNumber.row = row

		for col := 0; col < grid.cols; col++ {
			character := grid.cells[row][col]

			if unicode.IsNumber(character) {
				if asciiNumber.characters == "" {
					asciiNumber.startCol = col
				}
				asciiNumber.endCol = col
				asciiNumber.characters += string(character)
			}

			if !unicode.IsNumber(character) || col == grid.cols-1 {
				if asciiNumber.characters != "" {
					if coordinate := findSymbolInGridAroundAsciiNumber(grid, asciiNumber, symbols); coordinate != "" {
						number, _ := strconv.Atoi(asciiNumber.characters)
						sum += number
					}
					asciiNumber.characters = ""
				}
			}
		}
	}

	return sum
}

func Day03Part2(input string) int {
	grid := create2dGrid(input)
	asciiNumber := asciiNumber{"", 0, 0, 0}
	symbols := []rune{'*'}
	sum := 0
	m := make(map[string][]int)

	for row := 0; row < grid.rows; row++ {
		asciiNumber.row = row

		for col := 0; col < grid.cols; col++ {
			character := grid.cells[row][col]

			if unicode.IsNumber(character) {
				if asciiNumber.characters == "" {
					asciiNumber.startCol = col
				}
				asciiNumber.endCol = col
				asciiNumber.characters += string(character)
			}

			if !unicode.IsNumber(character) || col == grid.cols-1 {
				if asciiNumber.characters != "" {
					if coordinate := findSymbolInGridAroundAsciiNumber(grid, asciiNumber, symbols); coordinate != "" {
						number, _ := strconv.Atoi(asciiNumber.characters)
						m[coordinate] = append(m[coordinate], number)
					}
					asciiNumber.characters = ""
				}
			}
		}
	}

	for _, numbers := range m {
		if len(numbers) == 2 {
			sum += numbers[0] * numbers[1]
		}
	}

	return sum
}

func create2dGrid(input string) grid {
	lines := strings.Split(input, "\n")

	grid := grid{
		cells: make([][]rune, len(lines)),
		rows:  len(lines),
		cols:  len(lines[0]),
	}

	for i, line := range lines {
		grid.cells[i] = []rune(line)
	}

	return grid
}

func findSymbolInGridAroundAsciiNumber(grid grid, asciiNumber asciiNumber, symbols []rune) string {
	for r := max(asciiNumber.row-1, 0); r <= min(asciiNumber.row+1, grid.rows-1); r++ {
		for c := max(asciiNumber.startCol-1, 0); c <= min(asciiNumber.endCol+1, grid.cols-1); c++ {
			if slices.Contains(symbols, grid.cells[r][c]) {
				return strconv.Itoa(r) + ";" + strconv.Itoa(c)
			}
		}
	}

	return ""
}
