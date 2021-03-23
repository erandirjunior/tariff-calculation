<?php

namespace SRC\TariffCalculation\Domain;

class Tariff
{
    public function __construct(
        private int $userCoinNeed,
        private int $coinBase,
        private int $roomId,
        private int $sellerId,
        private int $hotelId
    )
    {}

    public function getUserCoinNeed(): int
    {
        return $this->userCoinNeed;
    }

    public function getCoinBase(): int
    {
        return $this->coinBase;
    }

    public function getRoomId(): int
    {
        return $this->roomId;
    }

    public function getSellerId(): int
    {
        return $this->sellerId;
    }

    public function getHotelId(): int
    {
        return $this->hotelId;
    }
}