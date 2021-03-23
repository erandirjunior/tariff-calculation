<?php

namespace SRC\RoomCurrency\Adapters\Gateways;

use SRC\RoomCurrency\Domain\Register\RegisterGateway;
use SRC\RoomCurrency\Domain\Register\RoomCurrency;
use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(RoomCurrency $roomCurrency): RegisteredRoomCurrency
    {
        $id = $this->registerUnit->register(
            $roomCurrency->getRoomId(),
            $roomCurrency->getCurrencyId(),
            $roomCurrency->getPrice(),
            $roomCurrency->getHotelId()
        );
        return new RegisteredRoomCurrency(
            $roomCurrency->getRoomId(),
            $roomCurrency->getCurrencyId(),
            $roomCurrency->getPrice(),
            $roomCurrency->getHotelId(),
            $id
        );
    }

    public function registerIfRoomCurrencyIsUnique(int $roomId, int $currencyId): bool
    {
        return $this->registerUnit->roomPrice($roomId, $currencyId);
    }

    public function checkIfCurrencyExists(int $currencyId): bool
    {
        return $this->registerUnit->checkIfCurrencyExists($currencyId);
    }
}