<?php

namespace SRC\Currency\Adapters\Gateways;

interface RegisterUnit
{
    public function register(string $currency, float $profitMargin): int;

    public function checkIfCurrencyIsInUse(string $currency): bool;
}