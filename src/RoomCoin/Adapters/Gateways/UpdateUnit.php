<?php

namespace SRC\RoomCoin\Adapters\Gateways;

interface UpdateUnit
{
    public function update(int $roomId, int $coinId, float $price, int $id, int $hotelId): bool;

    public function checkIfRoomPriceExists(int $roomId, int $id, int $hotelId): bool;

    public function checkIfRoomPriceAreNotInUse(int $roomId, int $coinId, int $id, int $hotelId): bool;

    public function checkIfCoinExists(int $coinId): bool;
}