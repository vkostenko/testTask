<?php

include __DIR__ . "/../vendor/autoload.php";

use VK\Task\Route;
use VK\Task\BoardingCard\AirplaneCard;
use VK\Task\BoardingCard\AirportBusCard;
use VK\Task\BoardingCard\TrainCard;

$route = new Route();
$route->addCard(new AirportBusCard("Barcelona", "Gerona Airport"));
$route->addCard(new AirplaneCard("Stockholm", "New York JFK", "SK22", "22", "7B", true));
$route->addCard(new AirplaneCard("Gerona Airport", "Stockholm", "SK455", "45B", "3A", false, "344"));
$route->addCard(new TrainCard("Madrid", "Barcelona", "78A", "45B"));

echo $route->getDescription();

