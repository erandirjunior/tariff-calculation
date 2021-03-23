<?php

namespace SRC\Coin\Adapters\Gateways;

interface RegisterUnit
{
    public function register(string $coin, float $profitMargin): int;

    public function checkIfMoneyIsInUse(string $money): bool;
}