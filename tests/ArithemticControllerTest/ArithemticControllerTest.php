<?php

namespace App\tests\ArithmeticSequenceTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\ArithmeticController\ArithmeticController;
use App\Service\ArithmeticService\ArithmeticService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ArithmeticSequenceControllerTest extends WebTestCase
{

    public function testGetArithmeticSequenceJson(): void
    {
        // Mock the ArithmeticService
        $ArithmeticService = $this->createMock(ArithmeticService::class);
        $ArithmeticService->method('getArithmeticSequence')
        ->willReturn([1, 2, 4, 8]); // Mock the expected Arithmetic sequence

        // Create a Request object with a JSON body
        $request = new Request();
        $request->initialize([], [], [], [], [], [], json_encode(['start' => 1, 'ratio' => 2, 'size' => 5]));

        // Create an instance of the controller
        $controller = new ArithmeticController();

        // Call the method under test
        $response = $controller->getArithmeticSequenceJson($request, $ArithmeticService);

        // Assert that the response is a JsonResponse
        $this->assertInstanceOf(JsonResponse::class, $response);

        // Assert that the response content is as expected
        $expectedContent = json_encode(['Arithmetic sequence' => json_encode([1, 2, 4, 8])]);
        $this->assertEquals($expectedContent, $response->getContent());
    }
}
