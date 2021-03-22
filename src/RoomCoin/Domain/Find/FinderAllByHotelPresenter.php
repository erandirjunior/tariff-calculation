<?php

namespace SRC\RoomCoin\Domain\Find;

interface FinderAllByHotelPresenter
{
    public function setData(RoomPriceContainer $roomPriceContainer): void;
}