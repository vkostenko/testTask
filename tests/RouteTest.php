<?php

namespace VK\Tests;

use PHPUnit\Framework\TestCase;
use VK\Task\BoardingCard\AirplaneCard;
use VK\Task\BoardingCard\AirportBusCard;
use VK\Task\BoardingCard\TrainCard;
use VK\Task\Route;

class RouteTest extends TestCase
{
    public function testPrintDescription_noCards() {
        $route = new Route();
        $this->assertEquals("No cards", $route->getDescription());
    }

    public function testPrintDescription_ok() {
        $route = new Route();
        $route->addCard(new AirportBusCard("Barcelona", "Gerona Airport"));
        $route->addCard(new AirplaneCard("Stockholm", "New York JFK", "SK22", "22", "7B", true));
        $route->addCard(new AirplaneCard("Gerona Airport", "Stockholm", "SK455", "45B", "3A", false, "344"));
        $route->addCard(new TrainCard("Madrid", "Barcelona", "78A", "45B"));

        $expectedMessage = "1. Take train 78A from Madrid to Barcelona. Sit in seat 45B" . PHP_EOL .
                                     "2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment." . PHP_EOL .
                                     "3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A." . PHP_EOL . "Baggage drop at ticket counter 344." . PHP_EOL .
                                     "4. From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B." . PHP_EOL . "Baggage will we automatically transferred from your last leg." . PHP_EOL .
                                     "5. You have arrived at your final destination.";

        $this->assertEquals($expectedMessage, $route->getDescription());
    }
}