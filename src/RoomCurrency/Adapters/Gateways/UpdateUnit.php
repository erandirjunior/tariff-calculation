<?php

namespace SRC\RoomCurrency\Adapters\Gateways;

interface UpdateUnit
{
    public function update(int $roomId, int $currencyId, float $price, int $id, int $hotelId): bool;

    public function checkIfRoomPriceExists(int $roomId, int $id, int $hotelId): bool;

    public function checkIfRoomPriceAreNotInUse(int $roomId, int $currencyId, int $id, int $hotelId): bool;

    public function checkIfCurrencyExists(int $currencyId): bool;
}