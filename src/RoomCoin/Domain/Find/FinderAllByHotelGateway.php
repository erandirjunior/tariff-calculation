<?php

namespace SRC\RoomCoin\Domain\Find;

interface FinderAllByHotelGateway
{
    public function findAll(int $hotelId): RoomPriceContainer;
}