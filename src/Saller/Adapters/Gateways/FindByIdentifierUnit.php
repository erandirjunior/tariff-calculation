<?php

namespace SRC\Saller\Adapters\Gateways;

interface FindByIdentifierUnit
{
    public function find(int $id): array;
}