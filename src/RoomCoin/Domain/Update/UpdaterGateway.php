<?php

namespace SRC\RoomCoin\Domain\Update;

use SRC\RoomCoin\Domain\RegisteredRoomCoin;

interface UpdaterGateway
{
    public function update(RegisteredRoomCoin $registeredRoomPrice): bool;

    public function checkIfRoomPriceExists(int $roomId, int $id): bool;

    public function checkIfRoomPriceAreNotInUse(int $roomId, int $coinId, int $id): bool;
}