<?php

namespace SRC\TariffCalculation\Domain;

interface GetCurrentExchangeValue
{
    public function getValue(string $currency): float;
}