<?php

namespace SRC\RoomCurrency\Adapters\Gateways;

interface FindByIdentifierUnit
{
    public function find(int $roomId, int $id, int $hotelId): array;
}