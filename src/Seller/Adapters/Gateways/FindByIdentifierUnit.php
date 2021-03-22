<?php

namespace SRC\Seller\Adapters\Gateways;

interface FindByIdentifierUnit
{
    public function find(int $id): array;
}