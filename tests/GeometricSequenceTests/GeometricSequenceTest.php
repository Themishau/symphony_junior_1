<?php

namespace App\tests\GeometricSequenceTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Controller\GeometricController\GeometricController;
use App\Service\GeometricService\GeometricService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GeometricSequenceControllerTest extends WebTestCase
{

    public function testGetGeometricSequenceJson(): void
    {
        // Mock the GeometricService
        $geometricService = $this->createMock(GeometricService::class);
        $geometricService->method('getGeometricSequence')
            ->willReturn([1, 2, 4, 8, 16]); // Mock the expected geometric sequence

        // Create a Request object with a JSON body
        $request = new Request();
        $request->initialize([], [], [], [], [], [], json_encode(['start' => 1, 'ratio' => 2, 'size' => 5]));

        // Create an instance of the controller
        $controller = new GeometricController();

        // Call the method under test
        $response = $controller->getGeometricSequenceJson($request, $geometricService);

        // Assert that the response is a JsonResponse
        $this->assertInstanceOf(JsonResponse::class, $response);

        // Assert that the response content is as expected
        $expectedContent = json_encode(['geometric sequence' => json_encode([1, 2, 4, 8, 16])]);
        $this->assertEquals($expectedContent, $response->getContent());
    }
}
