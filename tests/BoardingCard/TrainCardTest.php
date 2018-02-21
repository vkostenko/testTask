<?php

namespace VK\Tests\BoardingCard;

use PHPUnit\Framework\TestCase;
use VK\Task\BoardingCard\TrainCard;

class TrainCardTest extends TestCase
{
    /**
     * @dataProvider cardsProvider
     */
    public function testGetDescription(
        string $from,
        string $to,
        string $train,
        string $seat,
        string $expectedResult
    ) {
        $card = new TrainCard($from, $to, $train, $seat);

        $this->assertEquals($expectedResult, $card->getDescription());
    }

    public function cardsProvider() {
        return [
            [
                "from" => "A",
                "to" => "B",
                "train" => "C",
                "seat" => "10B",
                "expectedResult" => "Take train C from A to B. Sit in seat 10B"
            ]
        ];
    }
}