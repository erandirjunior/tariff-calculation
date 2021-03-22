<?php

namespace SRC\RoomCoin\Domain\Find;

use SRC\RoomCoin\Domain\RegisteredRoomCoin;

interface Presenter
{
    public function setData(RegisteredRoomCoin $registeredRoomPrice): void;
}