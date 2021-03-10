package main

import (
	"fmt"
	"math/rand"
	"time"
)

type UniqueRandomNumbers struct {
    generated map[int]bool
}

func main() {
    var matrix [2][2]int
    generated := UniqueRandomNumbers{generated: make(map[int]bool)}
	rand.Seed(time.Now().UTC().UnixNano())

    for i := 0; i < 2; i++ {
        for j := 0; j < 2; j++ {
            matrix[i][j] = generateUniqueNumber(&generated)
        }
    }

    fmt.Println(matrix)
    // [[1358168107676887844 7131654001842414025] [3698200856995272968 1116562883995817076]]
}

func generateUniqueNumber(urn *UniqueRandomNumbers) int {
    for {
        randomNumber := rand.Int()
        if !urn.generated[randomNumber] {
            urn.generated[randomNumber] = true
            return randomNumber
        }
    }
}
