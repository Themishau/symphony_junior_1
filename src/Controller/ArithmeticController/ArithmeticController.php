<?php

namespace App\Controller\ArithmeticController;

use App\Service\ArithmeticService\ArithmeticService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArithmeticController extends AbstractController
{

    #[Route('/api/ArithmeticJson', name: 'api_arithmetic_json', methods: ['POST'])]
    public function getArithmeticSequenceJson(Request $request, ArithmeticService $arithmeticSequenceComputer): JsonResponse
    {
        // Get the JSON content from the request
        $content = $request->getContent();

        // Decode the JSON content to get the size
        $data = json_decode($content, true);
        $start = $data['start'] ?? 0; // Default to 0 if 'size' is not provided
        $increment = $data['increment'] ?? 0; // Default to 0 if 'size' is not provided
        $size = $data['size'] ?? 0; // Default to 0 if 'size' is not provided

        // Compute 
        $computedArithmeticSequence = $arithmeticSequenceComputer->getArithmeticSequence($start, $increment, $size);
        $encode = json_encode($computedArithmeticSequence);

        return new JsonResponse(['Arithmetic sequence' => $encode]);
    }

}