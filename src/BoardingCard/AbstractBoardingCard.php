<?php
declare(strict_types=1);

namespace VK\Task\BoardingCard;

abstract class AbstractBoardingCard
{
    private $from;

    private $to;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function getFrom() : string {
        return $this->from;
    }

    public function getTo() : string {
        return $this->to;
    }

    abstract public function getDescription() : string;
}