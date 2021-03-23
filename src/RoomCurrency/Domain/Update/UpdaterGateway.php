<?php

namespace SRC\RoomCurrency\Domain\Update;

use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

interface UpdaterGateway
{
    public function update(RegisteredRoomCurrency $registeredRoomPrice): bool;

    public function checkIfRoomPriceExists(int $roomId, int $id, int $hotelId): bool;

    public function checkIfRoomPriceAreNotInUse(int $roomId, int $currencyId, int $id, int $hotelId): bool;

    public function checkIfCurrencyExists(int $currencyId): bool;
}