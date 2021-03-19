<?php

namespace SRC\Hotel\Adapters\Gateways;

interface UpdateUnit
{
    public function update(string $name, int $id): bool;

    public function checkIfHotelExists(int $id): bool;

    public function checkIfNameAreNotInUse(string $name, int $id): bool;
}