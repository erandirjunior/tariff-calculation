<?php

namespace SRC\RoomCoin\Infra\ViewModel;

use SRC\RoomCoin\Adapters\Presenters\FindAllVM;

class FindAll implements FindAllVM
{
    public function __construct(private array $data = [])
    {}

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(int $roomId, int $coinId, float $price, int $hotelId, int $id): void
    {
        $this->data[] = [
            'roomId' => $roomId,
            'coinId' => $coinId,
            'price' => $price,
            'hotelId' => $hotelId,
            'id' => $id
        ];
    }
}