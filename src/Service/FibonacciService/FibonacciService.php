<?php

namespace App\Service\FibonacciService;

class FibonacciService
{
    // caching to reduce computing time if size is big because of Big O
    private $cache = [0,1];


    public function getFibonacciSequence(int $size)
    {
        for ($i = 2; $i <= $size; $i++) 
        { 
            $this->calculateFibonacciSequence($size);
        }
        return $this->cache;
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