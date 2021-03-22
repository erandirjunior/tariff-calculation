<?php

namespace SRC\RoomCoin\Domain\Register;

use SRC\RoomCoin\Domain\RegisteredRoomCoin;

interface Presenter
{
    public function addData(RegisteredRoomCoin $registeredRoomPrice): void;
}