<?php

namespace SRC\Booking\Domain\Register;

class Booking
{
    public function __construct(
        private int $currencyBase,
        private int $userCurrencyNeed,
        private int $roomId,
        private int $userId,
        private int $sellerId,
        private int $hotelId
    )
    {}
    
    public function getCurrencyBase(): int
    {
        return $this->currencyBase;
    }
    
    public function getUserCurrencyNeed(): int
    {
        return $this->userCurrencyNeed;
    }
    
    public function getRoomId(): int
    {
        return $this->roomId;
    }
    
    public function getUserId(): int
    {
        return $this->userId;
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