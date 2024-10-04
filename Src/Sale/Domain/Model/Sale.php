<?php

declare(strict_types=1);

namespace Src\Sale\Domain\Model;

class Sale
{
    public function __construct(
        private int $id,
        private int $userId,
        private string $date,
        private float $totalPrice
    ) {}
    public function getId():int
    {
        return $this->id;
    }
    public function getUserIs():int
    {
        return $this->userId;
    }
    public function getDate():string
    {
        return $this->date;
    }
    public function getPriceTotal():float
    {
        return $this->totalPrice;
    }
}
