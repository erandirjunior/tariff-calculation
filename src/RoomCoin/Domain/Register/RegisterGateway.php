<?php

namespace SRC\RoomCoin\Domain\Register;

use SRC\RoomCoin\Domain\RegisteredRoomCoin;

interface RegisterGateway
{
    public function register(RoomCoin $roomPrice): RegisteredRoomCoin;

    public function registerIfRoomCoinIsUnique(int $roomId, int $coinId): bool;

    public function checkIfCoinExists(int $coinId): bool;
}