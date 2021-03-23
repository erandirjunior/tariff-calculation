<?php

namespace SRC\Booking\Domain\Register;

class Booking
{
    public function __construct(
        private int $coinBase,
        private int $userCoinNeed,
        private int $roomId,
        private int $userId,
        private int $sellerId,
        private int $hotelId
    )
    {}
    
    public function getCoinBase(): int
    {
        return $this->coinBase;
    }
    
    public function getUserCoinNeed(): int
    {
        return $this->userCoinNeed;
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