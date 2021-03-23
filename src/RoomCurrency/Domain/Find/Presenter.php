<?php

namespace SRC\RoomCurrency\Domain\Find;

use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

interface Presenter
{
    public function setData(RegisteredRoomCurrency $registeredRoomPrice): void;
}