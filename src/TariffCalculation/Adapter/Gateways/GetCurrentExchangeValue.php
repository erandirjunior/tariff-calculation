<?php

namespace SRC\TariffCalculation\Adapter\Gateways;

class GetCurrentExchangeValue implements \SRC\TariffCalculation\Domain\GetCurrentExchangeValue
{
    public function __construct(
        private GetCurrentExchangeUnit $getCurrentExchangeUnit
    )
    {}

    public function getValue(string $currency): float
    {
        return $this->getCurrentExchangeUnit->getValue($currency);
    }
}