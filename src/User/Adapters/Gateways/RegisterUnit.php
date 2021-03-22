<?php

namespace SRC\User\Adapters\Gateways;

interface RegisterUnit
{
    public function register(string $name, string $email): int;

    public function checkIfEmailIsInUse(string $email): bool;
}