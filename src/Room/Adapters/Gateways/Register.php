<?php

namespace SRC\Room\Adapters\Gateways;

use SRC\Room\Domain\Register\RegisterGateway;
use SRC\Room\Domain\Register\Room;
use SRC\Room\Domain\RegisteredRoom;

class Register implements RegisterGateway
{
    public function __construct(private RegisterUnit $registerUnit)
    {}

    public function register(Room $room): RegisteredRoom
    {
        $id = $this->registerUnit->register($room->getRoom(), $room->getHotel());
        return new RegisteredRoom(
            $room->getRoom(),
            $room->getHotel(),
            $id
        );
    }

    public function checkIfRoomIsInUse(string $room, int $hotelId): bool
    {
        return $this->registerUnit->checkRoomIsInUse($room, $hotelId);
    }
}