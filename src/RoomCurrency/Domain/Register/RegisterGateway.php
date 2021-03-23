<?php

namespace SRC\RoomCoin\Domain\Register;

use SRC\RoomCoin\Domain\RegisteredRoomCoin;

interface RegisterGateway
{
    public function register(RoomCoin $roomCoin): RegisteredRoomCoin;

    public function registerIfRoomCoinIsUnique(int $roomId, int $currencyId): bool;

    public function checkIfCoinExists(int $currencyId): bool;
}