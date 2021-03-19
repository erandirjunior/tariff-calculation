<?php

namespace SRC\Coin\Domain;

use SRC\Coin\Domain\Register\Coin;

class RegisteredCoin extends Coin
{
    public function __construct(
        private string $money,
        private float $profitMargin,
        private int $id
    )
    {
        parent::__construct($this->money, $this->profitMargin);
    }

    public function getId(): int
    {
        return $this->id;
    }
}