<?php

namespace App\Controller\FibonacciController;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class FibonacciController extends AbstractController
{

    #[Route('/hello', name: 'hello', methods: ['GET'])]
    public function index(): Response
    {
        return new JsonResponse(['fibonacci' => 'test fibu Hello']);
    }
}