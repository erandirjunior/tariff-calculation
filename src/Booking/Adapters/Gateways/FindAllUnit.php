<?php

namespace SRC\Booking\Adapters\Gateways;

interface FindAllUnit
{
    public function find(int $userId): array;
}