<?php

namespace SRC\Room\Adapters\Gateways;

use SRC\Room\Domain\RegisteredRoom;
use SRC\Room\Domain\Update\UpdaterGateway;

class Update implements UpdaterGateway
{
    public function __construct(private UpdateUnit $updateUnit)
    {}

    public function update(RegisteredRoom $registeredRoom): bool
    {
        return $this->updateUnit->update(
            $registeredRoom->getHotel(),
            $registeredRoom->getRoom(),
            $registeredRoom->getId()
        );
    }

    public function checkIfRoomExists(int $hotelId, int $id): bool
    {
        return $this->updateUnit->checkIfRoomExists($hotelId, $id);
    }

    public function checkIfRoomAreNotInUse(int $hotelId, string $room, int $id): bool
    {
        return $this->updateUnit->checkIfRoomAreNotInUse($hotelId, $room, $id);
    }
}