<?php

namespace SRC\RoomCoin\Domain\Register;

class Register
{
    public function __construct(
        private RegisterGateway $registerGateway,
        private Presenter $presenter
    )
    {}

    public function register(RoomCoin $roomCoin): void
    {
        $this->checkIfCoinExists($roomCoin);
    }

    private function checkIfCoinExists(RoomCoin $roomCoin): void
    {
        if (!$this->registerGateway->checkIfCoinExists($roomCoin->getCoinId())) {
            throw new \InvalidArgumentException('Coin is not valid!');
        }

        $this->registerIfRoomCoinIsUnique($roomCoin);
    }

    public function registerIfRoomCoinIsUnique(RoomCoin $roomCoin): void
    {
        $roomId = $roomCoin->getRoomId();
        $coinId = $roomCoin->getCoinId();
        if ($this->registerGateway->registerIfRoomCoinIsUnique($roomId, $coinId)) {
            $msg = "The room coin for this hotel's room already be registered.";
            throw new \DomainException($msg);
        }

        $this->registerData($roomCoin);
    }

    private function registerData(RoomCoin $roomCoin): void
    {
        $registeredRoomPrice = $this->registerGateway->register($roomCoin);
        $this->presenter->addData($registeredRoomPrice);
    }
}