<?php

namespace SRC\RoomCoin\Domain\Find;

use SRC\RoomCoin\Domain\RegisteredRoomCoin;

class RoomPriceContainer
{
    public function __construct(private array $data = [])
    {}

    public function add(RegisteredRoomCoin $registeredRoomPrice)
    {
        $this->data[] = $registeredRoomPrice;
    }

    public function getData(): array
    {
        return $this->data;
    }
}