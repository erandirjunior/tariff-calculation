<?php

namespace SRC\RoomCoin\Domain\Register;

use SRC\RoomCoin\Domain\RegisteredRoomCoin;

interface RegisterGateway
{
    public function register(RoomCoin $roomPrice): RegisteredRoomCoin;

    public function checkIfRoomIsInUse(int $roomId, int $coinId): bool;
}