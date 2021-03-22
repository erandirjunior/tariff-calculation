<?php

namespace SRC\Saller\Adapters\Gateways;

interface UpdateUnit
{
    public function update(string $name, float $profitMargin, int $id): bool;

    public function checkIfSallerExists(int $id): bool;

    public function checkIfNameAreNotInUse(string $name, int $id): bool;
}