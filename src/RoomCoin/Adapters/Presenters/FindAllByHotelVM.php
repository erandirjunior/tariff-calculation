<?php

namespace SRC\RoomCoin\Adapters\Presenters;

interface FindAllByHotelVM
{
    public function setData(int $roomId, int $coinId, float $price, int $id): void;

    public function getData(): array;
}