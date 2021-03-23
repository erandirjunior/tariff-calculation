<?php

namespace SRC\Booking\Adapters\Gateways;

interface FindByIdentifierUnit
{
    public function find(int $userId, int $id): array;
}