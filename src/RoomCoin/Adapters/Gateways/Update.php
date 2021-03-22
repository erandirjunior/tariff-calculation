<?php

namespace SRC\RoomCoin\Adapters\Gateways;

use SRC\RoomCoin\Domain\RegisteredRoomCoin;
use SRC\RoomCoin\Domain\Update\UpdaterGateway;

class Update implements UpdaterGateway
{
    public function __construct(private UpdateUnit $updateUnit)
    {}

    public function update(RegisteredRoomCoin $registeredRoomPrice): bool
    {
        return $this->updateUnit->update(
            $registeredRoomPrice->getRoomId(),
            $registeredRoomPrice->getCoinId(),
            $registeredRoomPrice->getPrice(),
            $registeredRoomPrice->getId()
        );
    }

    public function checkIfRoomPriceExists(int $roomId, int $id): bool
    {
        return $this->updateUnit->checkIfRoomPriceExists($roomId, $id);
    }

    public function checkIfRoomPriceAreNotInUse(int $roomId, int $coinId, int $id): bool
    {
        return $this->updateUnit->checkIfRoomPriceAreNotInUse($roomId, $coinId, $id);
    }
}