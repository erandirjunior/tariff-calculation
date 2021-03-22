<?php

namespace SRC\User\Adapters\Gateways;

interface FindByIdentifierUnit
{
    public function find(int $id): array;
}