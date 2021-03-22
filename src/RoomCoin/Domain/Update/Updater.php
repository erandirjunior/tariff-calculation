<?php

namespace SRC\RoomCoin\Domain\Update;

use SRC\RoomCoin\Domain\RegisteredRoomCoin;

class Updater
{
    public function __construct(private UpdaterGateway $updaterGateway)
    {}

    public function update(RegisteredRoomCoin $registeredRoomPrice): void
    {
        $id = $registeredRoomPrice->getId();
        $roomId = $registeredRoomPrice->getRoomId();
        $coinId = $registeredRoomPrice->getCoinId();

        if (!$this->updaterGateway->checkIfRoomPriceExists($roomId, $id)) {
            throw new \InvalidArgumentException('Room price not found!');
        }

        if ($this->updaterGateway->checkIfRoomPriceAreNotInUse($roomId, $coinId, $id)) {
            throw new \InvalidArgumentException('Room coin price already in use!');
        }

        $this->updaterGateway->update($registeredRoomPrice);
    }
}