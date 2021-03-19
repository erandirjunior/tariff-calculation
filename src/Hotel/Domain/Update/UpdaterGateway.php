<?php

namespace SRC\Hotel\Domain\Update;

use SRC\Hotel\Domain\RegisteredHotel;

interface UpdaterGateway
{
    public function update(RegisteredHotel $registeredHotel): bool;

    public function checkIfHotelExists(int $id): bool;

    public function checkIfNameAreNotInUse(string $name, int $id): bool;
}