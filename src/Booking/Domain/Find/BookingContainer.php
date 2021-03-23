<?php

namespace SRC\Booking\Domain\Find;

use SRC\Booking\Domain\ContractBooking;

class BookingContainer
{
    public function __construct(private array $data = [])
    {}

    public function add(ContractBooking $registeredCoin)
    {
        $this->data[] = $registeredCoin;
    }

    public function getData(): array
    {
        return $this->data;
    }
}