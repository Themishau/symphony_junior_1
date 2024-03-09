<?php

namespace App\Controller\FibonacciController;

use App\Service\FibonacciService\FibonacciService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class FibonacciController extends AbstractController
{

    #[Route('/api/fibonacciQuery/{size}', name: 'api_fibonacci_query', methods: ['GET'])]
    public function getFibonacciSequenceQuery(int $size, FibonacciService $fibonacciComputer): Response
    {
        // Compute 
        $computedFibonacciSequence = $fibonacciComputer->getFibonacciSequence($size);
        $encode = json_encode($computedFibonacciSequence);
        
        return new JsonResponse(['fibonacci sequence' => $encode]);
    }
    
    #[Route('/api/fibonacciJson', name: 'api_fibonacci_json', methods: ['POST'])]
    public function getFibonacciSequenceJson(Request $request, FibonacciService $fibonacciComputer): JsonResponse
    {
        // Get the JSON content from the request
        $content = $request->getContent();

        // Decode the JSON content to get the size
        $data = json_decode($content, true);
        $size = $data['size'] ?? 0; // Default to 0 if 'size' is not provided

        // Compute 
        $computedFibonacciSequence = $fibonacciComputer->getFibonacciSequence($size);
        $encode = json_encode($computedFibonacciSequence);

        return new JsonResponse(['fibonacci sequence' => $encode]);
    }

}