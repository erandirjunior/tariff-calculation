<?php

namespace SRC\TariffCalculation\Domain;

class Tariff
{
    public function __construct(
        private int $userCurrencyNeed,
        private int $currencyBase,
        private int $roomId,
        private int $sellerId,
        private int $hotelId
    )
    {}

    public function getUserCurrencyNeed(): int
    {
        return $this->userCurrencyNeed;
    }

    public function getCurrencyBase(): int
    {
        return $this->currencyBase;
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