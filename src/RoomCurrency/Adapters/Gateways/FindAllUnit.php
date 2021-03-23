<?php

namespace SRC\RoomCurrency\Adapters\Gateways;

interface FindAllUnit
{
    public function find(int $roomId, int $hotelId): array;
}