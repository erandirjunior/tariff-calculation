<?php

namespace SRC\Hotel\Adapters\Gateways;

interface FindByIdentifierUnit
{
    public function find(int $id): array;
}