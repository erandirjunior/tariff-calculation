<?php

namespace SRC\User\Adapters\Gateways;

interface UpdateUnit
{
    public function update(string $name, string $email, int $id): bool;

    public function checkIfEmailExists(int $id): bool;

    public function checkIfEmailAreNotInUse(string $email, int $id): bool;
}