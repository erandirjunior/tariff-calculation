<?php

namespace SRC\RoomCoin\Adapters\Gateways;

interface FindAllByHotelUnit
{
    public function find(int $hotelId): array;
}