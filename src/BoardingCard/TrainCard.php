<?php
declare(strict_types=1);

namespace VK\Task\BoardingCard;

class TrainCard extends AbstractBoardingCard
{
    private $trainName;

    private $seat;

    public function __construct(string $from, string $to, string $trainName, string $seat)
    {
        parent::__construct($from, $to);

        $this->trainName = $trainName;
        $this->seat = $seat;
    }

    public function getDescription() : string {
        return sprintf(
            "Take train %s from %s to %s. Sit in seat %s",
            $this->trainName,
            $this->getFrom(),
            $this->getTo(),
            $this->seat
        );
    }
}