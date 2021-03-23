<?php

namespace SRC\RoomCoin\Adapters\Presenters;

interface FindByIdentifierVM
{
    public function setData(int $roomId, int $coinId, float $price, int $hotelId, int $id): void;

    public function getData(): array;
}