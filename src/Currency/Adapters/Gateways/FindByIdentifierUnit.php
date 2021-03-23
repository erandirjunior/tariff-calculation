<?php

namespace SRC\Currency\Adapters\Gateways;

interface FindByIdentifierUnit
{
    public function find(int $id): array;
}