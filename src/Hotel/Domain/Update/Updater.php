<?php

namespace SRC\Hotel\Domain\Update;

use SRC\Hotel\Domain\RegisteredHotel;

class Updater
{
    public function __construct(private UpdaterGateway $updaterGateway)
    {}

    public function update(RegisteredHotel $registeredHotel): void
    {
        $id = $registeredHotel->getId();
        $name = $registeredHotel->getName();

        if (!$this->updaterGateway->checkIfHotelExists($id)) {
            throw new \InvalidArgumentException('Hotel not found!');
        }

        if ($this->updaterGateway->checkIfNameAreNotInUse($name, $id)) {
            throw new \InvalidArgumentException('The hotel name already in use!');
        }

        $this->updaterGateway->update($registeredHotel);
    }
}