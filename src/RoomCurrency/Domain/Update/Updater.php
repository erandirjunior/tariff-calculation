<?php

namespace SRC\RoomCurrency\Domain\Update;

use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

class Updater
{
    public function __construct(private UpdaterGateway $updaterGateway)
    {}

    public function update(RegisteredRoomCurrency $registeredRoomPrice): void
    {
        $id = $registeredRoomPrice->getId();
        $roomId = $registeredRoomPrice->getRoomId();
        $currencyId = $registeredRoomPrice->getCurrencyId();
        $hotelId = $registeredRoomPrice->getHotelId();
        $this->updateIfCurrencyExists($currencyId);
        $this->updateIfRoomExists($roomId, $id, $hotelId);
        $this->updateIfRoomPriceAreNotInUse($roomId, $currencyId, $id, $hotelId);

        $this->updaterGateway->update($registeredRoomPrice);
    }

    private function updateIfRoomExists($roomId, $id, int $hotelId): void
    {
        if (!$this->updaterGateway->checkIfRoomPriceExists($roomId, $id, $hotelId)) {
            throw new \InvalidArgumentException('Room price not found!');
        }
    }

    private function updateIfRoomPriceAreNotInUse(int $roomId, int $currencyId, int $id, int $hotelId): void
    {
        if ($this->updaterGateway->checkIfRoomPriceAreNotInUse($roomId, $currencyId, $id, $hotelId)) {
            throw new \InvalidArgumentException('Room price currency already in use!');
        }
    }

    private function updateIfCurrencyExists($currencyId): void
    {
        if (!$this->updaterGateway->checkIfCurrencyExists($currencyId)) {
            throw new \InvalidArgumentException('Currency is not valid!');
        }
    }
}