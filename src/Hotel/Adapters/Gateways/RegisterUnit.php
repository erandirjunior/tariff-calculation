<?php

namespace SRC\Hotel\Adapters\Gateways;

interface RegisterUnit
{
    public function register(string $name): int;

    public function checkINameIsInUse(string $name): bool;

    public function find(int $id): array;
}