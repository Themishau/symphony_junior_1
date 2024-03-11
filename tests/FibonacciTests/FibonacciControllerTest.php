<?php

namespace App\tests\FibonacciTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Service\FibonacciService\FibonacciService;
use App\Controller\FibonacciController\FibonacciController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FibonacciControllerTest extends WebTestCase
{
    public function testGetFibonacciSequenceQuery(): void
    {
        $client = static::createClient();

        // Replace '5' with the size of the Fibonacci sequence you want to test
        $client->request('GET', '/api/fibonacciQuery/5');

        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json');

        // Assert that the response contains the expected JSON structure
        $expectedJson = json_encode(['fibonacci sequence' => json_encode([0, 1, 1, 2, 3])]);
        $this->assertJson($expectedJson);

        // Alternatively, you can assert the response content directly
        $this->assertEquals($expectedJson, $client->getResponse()->getContent());
    }

    public function testGetFibonacciSequenceJson(): void
    {
        // Mock the FibonacciService
        $fibonacciService = $this->createMock(FibonacciService::class);
        $fibonacciService->method('getFibonacciSequence')
            ->willReturn([0, 1, 1, 2, 3]); // Mock the expected Fibonacci sequence

        // Create a Request object with a JSON body
        $request = new Request();
        $request->initialize([], [], [], [], [], [], json_encode(['size' => 5]));

        // Create an instance of the controller
        $controller = new FibonacciController();

        // Call the method under test
        $response = $controller->getFibonacciSequenceJson($request, $fibonacciService);

        // Assert that the response is a JsonResponse
        $this->assertInstanceOf(JsonResponse::class, $response);

        // Assert that the response content is as expected
        $expectedContent = json_encode(['fibonacci sequence' => json_encode([0, 1, 1, 2, 3])]);
        $this->assertEquals($expectedContent, $response->getContent());
    }
}
