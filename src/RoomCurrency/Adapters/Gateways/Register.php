<?php

namespace SRC\RoomCoin\Adapters\Gateways;

use SRC\RoomCoin\Domain\Register\RegisterGateway;
use SRC\RoomCoin\Domain\Register\RoomCoin;
use SRC\RoomCoin\Domain\RegisteredRoomCoin;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(RoomCoin $roomCoin): RegisteredRoomCoin
    {
        $id = $this->registerUnit->register(
            $roomCoin->getRoomId(),
            $roomCoin->getCoinId(),
            $roomCoin->getPrice(),
            $roomCoin->getHotelId()
        );
        return new RegisteredRoomCoin(
            $roomCoin->getRoomId(),
            $roomCoin->getCoinId(),
            $roomCoin->getPrice(),
            $roomCoin->getHotelId(),
            $id
        );
    }

    public function registerIfRoomCoinIsUnique(int $roomId, int $currencyId): bool
    {
        return $this->registerUnit->roomPrice($roomId, $currencyId);
    }

    public function checkIfCoinExists(int $currencyId): bool
    {
        return $this->registerUnit->checkIfCoinExists($currencyId);
    }
}