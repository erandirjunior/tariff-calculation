<?php

namespace SRC\Booking\Domain\Register;

class Contract extends Booking
{
    public function __construct(
        private int $coinBase,
        private int $userCoinNeed,
        private int $roomId,
        private int $userId,
        private int $sellerId,
        private int $hotelId,
        private string $date,
        private float $price
    )
    {
        parent::__construct(
            $coinBase,
            $userCoinNeed,
            $roomId,
            $userId,
            $sellerId,
            $hotelId
        );
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getPrice(): float
    {
        return $this->price;
    }
}