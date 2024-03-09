<?php

namespace App\Controller\GeometricController;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


class GeometricController extends AbstractController
{

    #[Route('/api/geometric/{size}', name: 'api_geometric', methods: ['GET'])]
    public function index(): Response
    {
        return new JsonResponse(['geometric' => 'test geo Hello']);
    }

}
