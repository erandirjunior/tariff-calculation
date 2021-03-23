<?php

namespace SRC\RoomCurrency\Domain\Register;

use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

interface RegisterGateway
{
    public function register(RoomCurrency $roomCurrency): RegisteredRoomCurrency;

    public function registerIfRoomCurrencyIsUnique(int $roomId, int $currencyId): bool;

    public function checkIfCurrencyExists(int $currencyId): bool;
}