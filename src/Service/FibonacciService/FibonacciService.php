<?php

namespace App\Service\FibonacciService;

class FibonacciService
{
    
    public function getFibonacciSequence(int $size)
    {

        // Base case for size 0 or 1
        if ($size <= 0) {
            return [];
        }
        elseif ($size == 1)
        {
            return [0];
        }
        elseif ($size == 2)
        {
            return [0, 1];
        }

        
        // Recursive case
        $sequence = $this->getFibonacciSequence($size - 1); // 3 -> [0,1]
        $lastElement = end($sequence); // Get the last element
        $secondLastElement = $sequence[count($sequence) - 2]; // Get the second last element
        $sequence[] = $lastElement + $secondLastElement; // Add the next Fibonacci number

    }

    private function calculateFibonacciSequence()
    {

    }


}