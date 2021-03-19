<?php

namespace SRC\Coin\Adapters\Gateways;

interface FindByIdentifierUnit
{
    public function find(int $id): array;
}