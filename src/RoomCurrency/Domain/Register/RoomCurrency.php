<?php

namespace SRC\RoomCurrency\Domain\Register;

class RoomCurrency
{
    public function __construct(
        private int $roomId,
        private int $currencyId,
        private float $price,
        private int $hotelId
    )
    {}

    public function getRoomId(): int
    {
        return $this->roomId;
    }

    public function getCurrencyId(): int
    {
        return $this->currencyId;
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