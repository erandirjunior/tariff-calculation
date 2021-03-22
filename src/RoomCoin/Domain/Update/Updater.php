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
        $this->updateIfCoinExists($coinId);
        $this->updateIfRoomExists($roomId, $id);
        $this->updateIfRoomPriceAreNotInUse($roomId, $coinId, $id);

        $this->updaterGateway->update($registeredRoomPrice);
    }

    private function updateIfRoomExists($roomId, $id): void
    {
        if (!$this->updaterGateway->checkIfRoomPriceExists($roomId, $id)) {
            throw new \InvalidArgumentException('Room price not found!');
        }
    }

    private function updateIfRoomPriceAreNotInUse($roomId, $coinId, $id): void
    {
        if ($this->updaterGateway->checkIfRoomPriceAreNotInUse($roomId, $coinId, $id)) {
            throw new \InvalidArgumentException('Room price coin already in use!');
        }
    }

    private function updateIfCoinExists($coinId): void
    {
        if (!$this->updaterGateway->checkIfCoinExists($coinId)) {
            throw new \InvalidArgumentException('Coin is not valid!');
        }
    }
}