<?php

namespace SRC\RoomCoin\Domain\Find;

use SRC\RoomCoin\Domain\RegisteredRoomCoin;

interface FinderByIdentifierGateway
{
    public function find(int $roomId, int $id, int $hotelId): RegisteredRoomCoin;
}