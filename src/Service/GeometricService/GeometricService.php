<?php

namespace App\Service\GeometricService;

class GeometricService
{
    public function getGeometricSequence(int $start, float $ratio, int $size)
    {
        $sequence = [$start];

        for ($i=0; $i < $size; $i++) { 
            if ($ratio == 0)
                return $sequence;
            $sequence[] = $start * $ratio;
            
        }


    }
}