<?php

namespace App\Controller\FibonacciController;

use App\Service\FibonacciService\FibonacciService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use OpenApi\Attributes as OA;

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
    #[OA\Post(
        path: "/api/fibonacci",
        summary: "Get Fibonacci sequence",
        description: "Compute and return the Fibonacci sequence up to a specified size",
        operationId: "getFibonacciSequence",
        requestBody: new OA\RequestBody(
            content: [
                "application/json" => new OA\MediaType(
                    schema: new OA\Schema(
                        type: "object",
                        properties: [
                            "size" => new OA\Schema(
                                type: "integer",
                                description: "The size of the Fibonacci sequence to compute",
                                example: 10
                            )
                        ]
                    )
                )
            ]
        ),
        responses: [
            "200" => new OA\Response(
                description: "Fibonacci sequence computed successfully",
                content: [
                    "application/json" => new OA\MediaType(
                        schema: new OA\Schema(
                            type: "object",
                            properties: [
                                "fibonacci sequence" => new OA\Schema(
                                    type: "string",
                                    description: "The computed Fibonacci sequence"
                                )
                            ]
                        )
                    )
                ]
            )
        ]
    )]
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