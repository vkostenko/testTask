<?php

namespace VK\Task\BoardingCard;

class AirportBusCard extends AbstractBoardingCard
{
    private $seat;

    public function __construct(string $from, string $to, string $seat = null)
    {
        parent::__construct($from, $to);

        $this->seat = $seat;
    }

    public function getDescription() : string {
        $description = sprintf(
            "Take the airport bus from %s to %s. ",
            $this->getFrom(),
            $this->getTo()
        );

        if ($this->seat) {
            $description .= sprintf("Sit in seat %s.", $this->seat);
        } else {
            $description .= "No seat assignment.";
        }

        return $description;
    }
}