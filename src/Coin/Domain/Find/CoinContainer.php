<?php

namespace SRC\Coin\Domain\Find;

use SRC\Coin\Domain\RegisteredCoin;

class CoinContainer
{
    public function __construct(private array $data = [])
    {}

    public function add(RegisteredCoin $registeredCoin)
    {
        $this->data[] = $registeredCoin;
    }

    public function getData(): array
    {
        return $this->data;
    }
}