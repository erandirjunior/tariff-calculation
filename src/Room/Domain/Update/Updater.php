<?php

namespace SRC\Room\Domain\Update;

use SRC\Room\Domain\RegisteredRoom;

class Updater
{
    public function __construct(private UpdaterGateway $updaterGateway)
    {}

    public function update(RegisteredRoom $registeredRoom): void
    {
        $id = $registeredRoom->getId();
        $room = $registeredRoom->getRoom();
        $hotel = $registeredRoom->getHotel();

        if (!$this->updaterGateway->checkIfRoomExists($hotel, $id)) {
            throw new \InvalidArgumentException('Room not found!');
        }

        if ($this->updaterGateway->checkIfRoomAreNotInUse($hotel, $room, $id)) {
            throw new \InvalidArgumentException('The room already be in registered to this hotel!');
        }

        $this->updaterGateway->update($registeredRoom);
    }
}