<?php
declare(strict_types=1);

namespace VK\Task\BoardingCard;

class AirplaneCard extends AbstractBoardingCard
{
    private $flightName;

    private $gate;

    private $seat;

    private $isBaggageAutoTransfer;

    private $baggageTicker;

    public function __construct(
        string $from,
        string $to,
        string $flightName,
        string $gate,
        string $seat,
        bool $isBaggageAutoTransfer,
        string $baggageTicker = ""
    ) {
        parent::__construct($from, $to);

        $this->flightName = $flightName;
        $this->gate = $gate;
        $this->seat = $seat;
        $this->isBaggageAutoTransfer = $isBaggageAutoTransfer;
        $this->baggageTicker = $baggageTicker;
    }

    public function getDescription() : string {
        $description = sprintf(
            "From %s, take flight %s to %s. Gate %s, seat %s." . PHP_EOL,
            $this->getFrom(),
            $this->flightName,
            $this->getTo(),
            $this->gate,
            $this->seat
        );

        if ($this->isBaggageAutoTransfer) {
            $description .= "Baggage will we automatically transferred from your last leg.";
        } else {
            $description .= sprintf("Baggage drop at ticket counter %s.", $this->baggageTicker);
        }

        return $description;
    }
}