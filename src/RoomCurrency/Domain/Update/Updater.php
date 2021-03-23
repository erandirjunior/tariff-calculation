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
        $hotelId = $registeredRoomPrice->getHotelId();
        $this->updateIfCoinExists($coinId);
        $this->updateIfRoomExists($roomId, $id, $hotelId);
        $this->updateIfRoomPriceAreNotInUse($roomId, $coinId, $id, $hotelId);

        $this->updaterGateway->update($registeredRoomPrice);
    }

    private function updateIfRoomExists($roomId, $id, int $hotelId): void
    {
        if (!$this->updaterGateway->checkIfRoomPriceExists($roomId, $id, $hotelId)) {
            throw new \InvalidArgumentException('Room price not found!');
        }
    }

    private function updateIfRoomPriceAreNotInUse(int $roomId, int $coinId, int $id, int $hotelId): void
    {
        if ($this->updaterGateway->checkIfRoomPriceAreNotInUse($roomId, $coinId, $id, $hotelId)) {
            throw new \InvalidArgumentException('Room price coin already in use!');
        }
    }

    private function updateIfCoinExists($coinId): void
    {
        if (!$this->updaterGateway->checkIfCoinExists($coinId)) {
            throw new \InvalidArgumentException('Currency is not valid!');
        }
    }
}