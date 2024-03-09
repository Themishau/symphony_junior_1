<?php

namespace App\Controller\GeometricController;

use App\Service\GeometricService\GeometricService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class GeometricController extends AbstractController
{

    #[Route('/api/GeometricSequenceJson', name: 'api_geometric_json', methods: ['POST'])]
    public function getGeometricSequenceJson(Request $request, GeometricService $geometricSequenceComputer): JsonResponse
    {
        // Get the JSON content from the request
        $content = $request->getContent();

        // Decode the JSON content to get the size
        $data = json_decode($content, true);
        $start = $data['start'] ?? 0; // Default to 0 if 'size' is not provided
        $ratio = $data['ratio'] ?? 0; // Default to 0 if 'size' is not provided
        $size = $data['size'] ?? 0; // Default to 0 if 'size' is not provided

        // Compute 
        $computedGeometricSequence = $geometricSequenceComputer->getGeometricSequence($start, $ratio, $size);
        $encode = json_encode($computedGeometricSequence);

        return new JsonResponse(['geometric sequence' => $encode]);
    }

}
