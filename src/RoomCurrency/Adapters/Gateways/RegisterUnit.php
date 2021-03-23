<?php

namespace SRC\RoomCoin\Adapters\Gateways;

interface RegisterUnit
{
    public function register(int $roomId, int $currencyId, float $price, int $hotelId): int;

    public function roomPrice(int $roomId, int $currencyId): bool;

    public function checkIfCoinExists(int $currencyId): bool;
}