<?php

namespace SRC\RoomCurrency\Domain\Find;

interface FinderAllPresenter
{
    public function setData(RoomPriceContainer $roomPriceContainer): void;
}