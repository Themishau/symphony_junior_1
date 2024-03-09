<?php

namespace App\Controller\FibonacciController;

use App\Service\FibonacciService\FibonacciService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class FibonacciController extends AbstractController
{

    #[Route('/TestFibonacci', name: 'Test', methods: ['GET'])]
    public function test(): Response
    {
        return new JsonResponse(['fibonacci' => 'Hello Fibonacci']);
    }
    #[Route('/api/fibonacciQuery/{size}', name: 'api_fibonacci_query', methods: ['GET'])]
    public function getFibonacciSequenceQuery(int $size, FibonacciService $fibonacciComputer): Response
    {
        return new JsonResponse(['fibonacci sequence' => $fibonacciComputer->getFibonacciSequence($size)]);
    }
    #[Route('/api/fibonacciJson', name: 'api_fibonacci_json', methods: ['GET'])]
    public function getFibonacciSequenceJson(int $size, FibonacciService $fibonacciComputer): JsonResponse
    {
        $result = $fibonacciComputer->getFibonacciSequence($size);
        $encode = json_encode($result);
        echo $encode;
        return new JsonResponse(['fibonacci sequence' => $encode]);
    }

}