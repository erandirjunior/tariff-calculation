<?php

namespace SRC\RoomCurrency\Domain\Find;

use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

interface FinderByIdentifierGateway
{
    public function find(int $roomId, int $id, int $hotelId): RegisteredRoomCurrency;
}