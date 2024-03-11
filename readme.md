# Symfony REST API for Sequence Generation

This project demonstrates the creation of a Symfony application that provides a REST API for generating sequences based on different progressions: Arithmetic, Geometric, and Fibonacci. The API allows clients to specify parameters such as start, increment, ratio, and size to generate the desired sequence.

## Features

- **Arithmetic Sequence Generation**: Generates a sequence of numbers where each term is obtained by adding a constant difference to the previous term. (WIP)
- **Geometric Sequence Generation**: Generates a sequence of numbers where each term is obtained by multiplying the previous term by a constant ratio.
- **Fibonacci Sequence Generation**: Generates a sequence of Fibonacci numbers, where each number is the sum of the two preceding ones.

## Requirements

- PHP 8.2 or higher
- Symfony 6.x
- Git for source code management
  
## Installation
1. Clone the repository:

```
- git clone https://github.com/Themishau/symphony_junior_1.git
```

2. Navigate to the project directory:
```
- cd <standard symfony root folder>
```
3. Install dependencies:
```
composer install 
```
5. Start the Symfony server:
```
symfony server:start
```
## Usage

The API provides endpoints for generating each type of sequence. The client can specify the parameters for the sequence in the request body.

### Arithmetic Sequence (WIP)

Endpoint: `/api/arithmetic`

Request Body:
```
json { "start": 1, "increment": 1, "size": 5 }
```
### Geometric Sequence

Endpoint: `/api/GeometricSequenceJson`

Request Body:
```
json { "start": 100, "ratio": 0.5, "size": 5 }
```

### Fibonacci Sequence

Endpoint: `/api/fibonacciJson`
Query: `/fibonacciQuery/{size}`

Request Body:

```
- json { "size": 10 }
```

## Dockerfile and Makefile (WIP)

There is also a Dockerfile and Makefile to use this API with Docker. 

## Contributing

Contributions are welcome. Please submit a pull request with your changes.

## License

This project is licensed under the MIT License. See the `LICENSE` file for details.


