<?php

namespace SRC\TariffCalculation\Adapter\Gateways;

interface GetCurrentExchangeUnit
{
    public function getValue(string $currency): float;
}