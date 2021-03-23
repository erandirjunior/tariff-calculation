<?php

namespace SRC\RoomCurrency\Domain\Find;

interface FinderAllGateway
{
    public function findAll(int $roomId, int $hotelId): RoomPriceContainer;
}