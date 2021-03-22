<?php

namespace SRC\Seller\Adapters\Gateways;

interface UpdateUnit
{
    public function update(string $name, float $profitMargin, int $id): bool;

    public function checkIfSellerExists(int $id): bool;

    public function checkIfNameAreNotInUse(string $name, int $id): bool;
}