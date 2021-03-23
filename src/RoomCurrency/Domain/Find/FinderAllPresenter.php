<?php

namespace SRC\RoomCoin\Domain\Find;

interface FinderAllPresenter
{
    public function setData(RoomPriceContainer $roomPriceContainer): void;
}