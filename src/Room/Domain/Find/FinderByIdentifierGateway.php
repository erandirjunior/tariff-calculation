<?php

namespace SRC\Room\Domain\Find;

use SRC\Room\Domain\RegisteredRoom;

interface FinderByIdentifierGateway
{
    public function find(int $hotelId, int $id): RegisteredRoom;
}