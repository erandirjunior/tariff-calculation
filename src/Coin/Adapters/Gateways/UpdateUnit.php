<?php

namespace SRC\Coin\Adapters\Gateways;

interface UpdateUnit
{
    public function update(string $money, float $profitMargin, int $id): bool;

    public function checkIfCoinExists(int $id): bool;
}