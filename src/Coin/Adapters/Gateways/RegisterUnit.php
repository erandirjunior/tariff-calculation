<?php

namespace SRC\Coin\Adapters\Gateways;

interface RegisterUnit
{
    public function register(string $money, float $profitMargin): int;

    public function checkIfMoneyIsInUse(string $money): bool;

    public function find(int $id): array;
}