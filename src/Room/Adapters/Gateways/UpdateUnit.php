<?php

namespace SRC\Room\Adapters\Gateways;

interface UpdateUnit
{
    public function update(int $hotelId, string $name, int $id): bool;

    public function checkIfRoomExists(int $hotelId, int $id): bool;

    public function checkIfRoomAreNotInUse(int $hotelId, string $name, int $id): bool;
}