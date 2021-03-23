<?php

namespace SRC\RoomCurrency\Adapters\Gateways;

use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;
use SRC\RoomCurrency\Domain\Update\UpdaterGateway;

class Update implements UpdaterGateway
{
    public function __construct(private UpdateUnit $updateUnit)
    {}

    public function update(RegisteredRoomCurrency $registeredRoomPrice): bool
    {
        return $this->updateUnit->update(
            $registeredRoomPrice->getRoomId(),
            $registeredRoomPrice->getCurrencyId(),
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

    public function checkIfCurrencyExists(int $currencyId): bool
    {
        return $this->updateUnit->checkIfCurrencyExists($currencyId);
    }
}