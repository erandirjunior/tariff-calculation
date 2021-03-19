<?php

namespace SRC\Room\Adapters\Gateways;

interface FindByIdentifierUnit
{
    public function find(int $hotelId, int $id): array;
}