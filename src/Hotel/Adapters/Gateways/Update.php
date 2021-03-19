<?php

namespace SRC\Hotel\Adapters\Gateways;

use SRC\Hotel\Domain\RegisteredHotel;
use SRC\Hotel\Domain\Update\UpdaterGateway;

class Update implements UpdaterGateway
{
    public function __construct(private UpdateUnit $updateUnit)
    {}

    public function update(RegisteredHotel $registeredHotel): bool
    {
        return $this->updateUnit->update(
            $registeredHotel->getName(),
            $registeredHotel->getId()
        );
    }

    public function checkIfHotelExists(int $id): bool
    {
        return $this->updateUnit->checkIfHotelExists($id);
    }

    public function checkIfNameAreNotInUse(string $name, int $id): bool
    {
        return $this->updateUnit->checkIfNameAreNotInUse($name, $id);
    }
}