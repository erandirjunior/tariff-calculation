<?php

namespace SRC\Currency\Domain\Register;

class Currency
{
    public function __construct(
        private string $currency,
        private float $profitMargin
    )
    {
        if ($this->profitMargin < 0) {
            $msg = 'Field profit margin should be equal or bigger than 0!';
            throw new \InvalidArgumentException($msg);
        }

        if (strlen($this->currency) !== 3 || !is_string($this->currency)) {
            $msg = 'Field currency is invalid!';
            throw new \InvalidArgumentException($msg);
        }

        $this->currency = strtoupper($this->currency);
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
    public function getProfitMargin(): float
    {
        return $this->profitMargin;
    }
}