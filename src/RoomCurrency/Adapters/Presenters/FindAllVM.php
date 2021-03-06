<?php

namespace SRC\RoomCurrency\Adapters\Presenters;

interface FindAllVM
{
    public function setData(int $roomId, int $currencyId, float $price, int $hotelId, int $id): void;

    public function getData(): array;
}