<?php

namespace SRC\RoomCurrency\Domain\Find;

use SRC\RoomCurrency\Domain\RegisteredRoomCurrency;

class RoomPriceContainer
{
    public function __construct(private array $data = [])
    {}

    public function add(RegisteredRoomCurrency $registeredRoomPrice)
    {
        $this->data[] = $registeredRoomPrice;
    }

    public function getData(): array
    {
        return $this->data;
    }
}