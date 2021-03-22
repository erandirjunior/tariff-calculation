<?php

namespace SRC\RoomCoin\Domain\Register;

class Register
{
    public function __construct(
        private RegisterGateway $registerGateway,
        private Presenter $presenter
    )
    {}

    public function register(RoomCoin $roomPrice): void
    {
        $this->registerIfRoomIsUnique($roomPrice);
    }

    public function registerIfRoomIsUnique(RoomCoin $roomPrice): void
    {
        $roomId = $roomPrice->getRoomId();
        $coinId = $roomPrice->getCoinId();
        if ($this->registerGateway->checkIfRoomIsInUse($roomId, $coinId)) {
            throw new \DomainException('Room price in use!');
        }

        $this->registerData($roomPrice);
    }

    private function registerData(RoomCoin $roomPrice): void
    {
        $registeredRoomPrice = $this->registerGateway->register($roomPrice);
        $this->presenter->addData($registeredRoomPrice);
    }
}