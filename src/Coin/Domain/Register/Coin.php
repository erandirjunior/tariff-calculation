<?php

namespace SRC\Coin\Domain\Register;

class Coin
{
    public function __construct(
        private string $money,
        private float $profitMargin
    )
    {
        if ($this->profitMargin < 0) {
            $msg = 'Field profit margin should be equal or bigger than 0!';
            throw new \InvalidArgumentException($msg);
        }

        if (strlen($this->money) !== 3 || !is_string($this->money)) {
            $msg = 'Field money is invalid!';
            throw new \InvalidArgumentException($msg);
        }

        $this->money = strtoupper($this->money);
    }

    public function getMoney(): string
    {
        return $this->money;
    }
    public function getProfitMargin(): float
    {
        return $this->profitMargin;
    }
}