package main

import (
	"fmt"
	"math"
)

func Sqrt(x float64) float64 {
	z := 1.0
	tolerance := 0.00000001
	for {
		old_z := z
		if z = z - ((z*z - x) / (2 * z)); math.Abs(old_z-z) < tolerance {
			return z
		}
	}
}

func main() {
	fmt.Println(Sqrt(313))
	fmt.Println(math.Sqrt(313))
}
