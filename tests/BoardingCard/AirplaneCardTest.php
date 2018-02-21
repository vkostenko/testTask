<?php

namespace VK\Tests\BoardingCard;

use PHPUnit\Framework\TestCase;
use VK\Task\BoardingCard\AirplaneCard;

class AirplaneCardTest extends TestCase
{
    /**
     * @dataProvider cardsProvider
     */
    public function testGetDescription(
        string $from,
        string $to,
        string $flightName,
        string $gate,
        string $seat,
        bool $isBaggageAutoTransfer,
        string $baggageTicker,
        string $expectedResult
    ) {
        $card = new AirplaneCard($from, $to, $flightName, $gate, $seat, $isBaggageAutoTransfer, $baggageTicker);

        $this->assertEquals($expectedResult, $card->getDescription());
    }

    public function cardsProvider() {
        return [
            "without_auto_transfer" => [
                "from" => "A",
                "to" => "B",
                "flighName" => "C",
                "gate" => "gate_30",
                "seat" => "10B",
                "isBaggageAutoTransfer" => false,
                "baggageTicker" => "345",
                "expectedResult" => "From A, take flight C to B. Gate gate_30, seat 10B." . PHP_EOL . "Baggage drop at ticket counter 345."
            ],
            "with_auto_transfer" => [
                "from" => "A",
                "to" => "B",
                "flighName" => "C",
                "gate" => "gate_30",
                "seat" => "10B",
                "isBaggageAutoTransfer" => true,
                "baggageTicker" => "345",
                "expectedResult" => "From A, take flight C to B. Gate gate_30, seat 10B." . PHP_EOL . "Baggage will we automatically transferred from your last leg."
            ],
        ];
    }
}