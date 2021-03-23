<?php

namespace SRC\RoomCoin\Domain\Find;

interface FinderAllGateway
{
    public function findAll(int $roomId, int $hotelId): RoomPriceContainer;
}