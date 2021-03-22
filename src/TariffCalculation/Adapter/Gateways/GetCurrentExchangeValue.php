<?php

namespace SRC\TariffCalculation\Adapter\Gateways;

class GetCurrentExchangeValue implements \SRC\TariffCalculation\Domain\GetCurrentExchangeValue
{
    public function __construct(
        private GetCurrentExchangeUnit $getCurrentExchangeUnit
    )
    {}

    public function getValue(string $coin): float
    {
        return $this->getCurrentExchangeUnit->getValue($coin);
    }
}