<?php

namespace App\Service\FibonacciService;

class FibonacciService
{
    // Caching to reduce computing time if size is big because of Big O
    private $cache = [0,1];


    public function getFibonacciSequence(int $size)
    {
        for ($i = 2; $i <= $size; $i++) 
        { 
            $this->calculateFibonacciSequence($size);
        }
        // We get to many elements, we need to trim it a little bit
        return array_slice($this->cache, 0, $size);
    }


    public function calculateFibonacciSequence(int $size)
    {

        // If the sequence is already in the cache, return it
        if (isset($this->cache[$size])) {
            return $this->cache[$size];
        }

        // Calculate the sequence and store it in the cache
        $this->cache[$size] = $this->calculateFibonacciSequence($size - 1) + $this->calculateFibonacciSequence($size - 2);

        return $this->cache[$size];
    }

}