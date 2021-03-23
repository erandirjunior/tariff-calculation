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
            $registeredRoomPrice->getId(),
            $registeredRoomPrice->getHotelId()
        );
    }

    public function checkIfRoomPriceExists(int $roomId, int $id, int $hotelId): bool
    {
        return $this->updateUnit->checkIfRoomPriceExists($roomId, $id, $hotelId);
    }

    public function checkIfRoomPriceAreNotInUse(int $roomId, int $currencyId, int $id, int $hotelId): bool
    {
        return $this->updateUnit->checkIfRoomPriceAreNotInUse($roomId, $currencyId, $id, $hotelId);
    }

    public function checkIfCoinExists(int $currencyId): bool
    {
        return $this->updateUnit->checkIfCoinExists($currencyId);
    }
}