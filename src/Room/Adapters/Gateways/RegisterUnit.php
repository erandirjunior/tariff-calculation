<?php

namespace SRC\Room\Adapters\Gateways;

interface RegisterUnit
{
    public function register(string $room, int $hotelId): int;

    public function checkRoomIsInUse(string $room, int $hotelId): bool;
}