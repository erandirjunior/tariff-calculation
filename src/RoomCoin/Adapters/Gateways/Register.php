<?php

namespace SRC\RoomCoin\Adapters\Gateways;

use SRC\RoomCoin\Domain\Register\RegisterGateway;
use SRC\RoomCoin\Domain\Register\RoomCoin;
use SRC\RoomCoin\Domain\RegisteredRoomCoin;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(RoomCoin $roomPrice): RegisteredRoomCoin
    {
        $id = $this->registerUnit->register(
            $roomPrice->getRoomId(),
            $roomPrice->getCoinId(),
            $roomPrice->getPrice()
        );
        $data = $this->registerUnit->find($roomPrice->getRoomId(), $id);
        return new RegisteredRoomCoin(
            $data['room_id'],
            $data['coin_id'],
            $data['price'],
            $data['id']
        );
    }

    public function registerIfRoomCoinIsUnique(int $roomId, int $coinId): bool
    {
        return $this->registerUnit->roomPrice($roomId, $coinId);
    }

    public function checkIfCoinExists(int $coinId): bool
    {
        return $this->registerUnit->checkIfCoinExists($coinId);
    }
}