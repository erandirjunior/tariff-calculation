<?php

namespace SRC\Room\Domain\Register;

class Register
{
    public function __construct(
        private RegisterGateway $registerGateway,
        private Presenter $presenter
    )
    {}

    public function register(Room $room): void
    {
        $this->registerIfRoomIsUnique($room);
    }

    public function registerIfRoomIsUnique(Room $room): void
    {
        $roomType = $room->getRoom();
        $hotel = $room->getHotel();
        if ($this->registerGateway->checkIfRoomIsInUse($roomType, $hotel)) {
            throw new \DomainException('The room already be in registered to this hotel!');
        }

        $this->registerData($room);
    }

    private function registerData(Room $room): void
    {
        $registeredRoom = $this->registerGateway->register($room);
        $this->presenter->addData($registeredRoom);
    }
}