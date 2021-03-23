<?php

namespace SRC\Seller\Adapters\Gateways;

interface RegisterUnit
{
    public function register(string $name, float $profitMargin): int;

    public function checkIfNameIsInUse(string $name): bool;
}