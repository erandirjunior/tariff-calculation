<?php

namespace SRC\RoomCurrency\Domain\Register;

use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

interface Presenter
{
    public function addData(RegisteredRoomCurrency $registeredRoomPrice): void;
}