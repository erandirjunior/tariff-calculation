<?php

namespace SRC\Currency\Adapters\Gateways;

interface UpdateUnit
{
    public function update(string $currency, float $profitMargin, int $id): bool;

    public function checkIfCurrencyExists(int $id): bool;

    public function checkIfCurrencyAreNotInUse(string $currency, int $id): bool;
}