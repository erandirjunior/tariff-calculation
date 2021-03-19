<?php

namespace SRC\Room\Domain\Register;

use SRC\Room\Domain\RegisteredRoom;

interface RegisterGateway
{
    public function register(Room $room): RegisteredRoom;

    public function checkIfRoomIsInUse(string $room, int $hotelId): bool;
}