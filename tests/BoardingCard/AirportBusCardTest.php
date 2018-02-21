<?php

namespace VK\Tests\BoardingCard;

use PHPUnit\Framework\TestCase;
use VK\Task\BoardingCard\AirportBusCard;

class AirportBusCardTest extends TestCase
{
    public function testGetDescription_withSeat() {
        $card = new AirportBusCard("A", "B", "10C");
        $this->assertEquals("Take the airport bus from A to B. Sit in seat 10C.", $card->getDescription());
    }

    public function testGetDescription_withoutSeat() {
        $card = new AirportBusCard("A", "B");
        $this->assertEquals("Take the airport bus from A to B. No seat assignment.", $card->getDescription());
    }
}