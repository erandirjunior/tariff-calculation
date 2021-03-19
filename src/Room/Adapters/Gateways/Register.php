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
        $data = $this->registerUnit->find($room->getHotel(), $id);
        return new RegisteredRoom(
            $data['room'],
            $data['hotel_id'],
            $data['id']
        );
    }

    public function checkIfRoomIsInUse(string $room, int $hotelId): bool
    {
        return $this->registerUnit->checkRoomIsInUse($room, $hotelId);
    }
}