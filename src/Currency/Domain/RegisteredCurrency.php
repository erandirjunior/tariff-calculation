<?php

namespace SRC\Currency\Domain;

use SRC\Currency\Domain\Register\Currency;

class RegisteredCurrency extends Currency
{
    public function __construct(
        private string $currency,
        private float $profitMargin,
        private int $id
    )
    {
        parent::__construct($this->currency, $this->profitMargin);
    }

    public function getId(): int
    {
        return $this->id;
    }
}