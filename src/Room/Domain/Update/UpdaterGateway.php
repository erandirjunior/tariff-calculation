<?php

namespace SRC\Room\Domain\Update;

use SRC\Room\Domain\RegisteredRoom;

interface UpdaterGateway
{
    public function update(RegisteredRoom $registeredRoom): bool;

    public function checkIfRoomExists(int $hotelId, int $id): bool;

    public function checkIfRoomAreNotInUse(int $hotelId, string $room, int $id): bool;
}