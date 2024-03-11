<?php

namespace App\Service\ArithmeticService;

class ArithmeticService
{
    public function getArithmeticSequence(int $start, float $increment, int $size)
    {
        $sequence = [$start];

        for ($i=0; $i < $size; $i++) { 
            if ($increment == 0)
                return $sequence;
            $sequence[] = $start + $increment;
            
        }
    }
}