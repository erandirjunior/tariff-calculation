<?php

namespace SRC\RoomCoin\Domain\Register;

class RoomCoin
{
    public function __construct(
        private int $roomId,
        private int $coinId,
        private float $price,
        private int $hotelId
    )
    {}

    public function getRoomId(): int
    {
        return $this->roomId;
    }

    public function getCoinId(): int
    {
        return $this->coinId;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getHotelId(): int
    {
        return $this->hotelId;
    }
}