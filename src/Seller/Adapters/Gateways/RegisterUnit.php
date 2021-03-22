<?php

namespace SRC\Seller\Adapters\Gateways;

interface RegisterUnit
{
    public function register(string $money, float $profitMargin): int;

    public function checkIfNameIsInUse(string $money): bool;
}