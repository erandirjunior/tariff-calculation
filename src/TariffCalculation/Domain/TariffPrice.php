<?php

namespace SRC\TariffCalculation\Domain;

class TariffPrice
{
    public function __construct(
        private int $fromCoinId,
        private int $toCoinId,
        private int $roomId,
        private int $hotelId
    )
    {}

    public function getFromCoinId(): int
    {
        return $this->fromCoinId;
    }

    public function getToCoinId(): int
    {
        return $this->toCoinId;
    }

    public function getRoomId(): int
    {
        return $this->roomId;
    }

    public function getHotelId(): int
    {
        return $this->hotelId;
    }
}