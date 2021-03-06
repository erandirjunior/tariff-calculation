<?php

namespace SRC\Booking\Domain;

use SRC\Booking\Domain\Register\Contract;

class ContractBooking extends Contract
{
    public function __construct(
        private int $currencyBase,
        private int $userCurrencyNeed,
        private int $roomId,
        private int $userId,
        private int $sellerId,
        private int $hotelId,
        private string $date,
        private int $id,
        private float $price
    )
    {
        parent::__construct(
            $this->currencyBase,
            $this->userCurrencyNeed,
            $this->roomId,
            $this->userId,
            $this->sellerId,
            $this->hotelId,
            $this->date,
            $this->price
        );
    }

    public function getId(): int
    {
        return $this->id;
    }
}