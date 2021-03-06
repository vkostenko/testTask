<?php
declare(strict_types=1);

namespace VK\Task;

use VK\Task\BoardingCard\AbstractBoardingCard;

class Route
{
    /**
     * @var AbstractBoardingCard[]
     */
    private $cards = [];

    /**
     * @var string[]
     */
    private $destinations = [];

    /**
     * @var bool
     */
    private $isSorted = false;

    /**
     * @param AbstractBoardingCard $card
     */
    public function addCard(AbstractBoardingCard $card) {
        $this->cards[$card->getFrom()] = $card;
        $this->destinations[$card->getTo()] = 1;
        $this->isSorted = false;
    }

    /**
     * @return string
     */
    public function getDescription() : string {
        if (empty($this->cards)) {
            return "No cards";
        }

        $description = "";
        $i = 1;
        foreach ($this->getDescriptions() as $item) {
            $description .= $i . ". " . $item . PHP_EOL;
            $i++;
        }
        $description .= $i . ". You have arrived at your final destination.";

        return $description;
    }

    /**
     * @return string[]
     */
    private function getDescriptions() : array {
        $this->sortIfNeeded();

        return array_map(
            function(AbstractBoardingCard $card) {
                return $card->getDescription();
            },
            $this->cards
        );
    }

    private function sortIfNeeded() {
        if ($this->isSorted) {
            return;
        }

        $startPoint = $this->getRouteStartPoint();
        if (empty($startPoint)) {
            return;
        }

        $sortedCards = [
            $startPoint => $this->cards[$startPoint]
        ];

        while (true) {
            $destination = $this->cards[$startPoint]->getTo();
            if (isset($sortedCards[$destination]) || !isset($this->cards[$destination])) {
                break;
            }

            if (isset($this->cards[$destination])) {
                $sortedCards[$destination] = $this->cards[$destination];
                $startPoint = $destination;
            }
        }

        $this->cards = $sortedCards;
        $this->isSorted = true;
    }

    private function getRouteStartPoint() : string {
        $startPoint = "";
        foreach ($this->cards as $from => $card) {
            if (!isset($this->destinations[$card->getFrom()])) {
                $startPoint = $from;
                break;
            }
        }

        return $startPoint;
    }
}