<?php

namespace SRC\Currency\Domain\Find;

use SRC\Currency\Domain\RegisteredCurrency;

class CurrencyContainer
{
    public function __construct(private array $data = [])
    {}

    public function add(RegisteredCurrency $registeredCurrency)
    {
        $this->data[] = $registeredCurrency;
    }

    public function getData(): array
    {
        return $this->data;
    }
}