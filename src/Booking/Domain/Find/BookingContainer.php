<?php

namespace SRC\Booking\Domain\Find;

use SRC\Booking\Domain\ContractBooking;

class BookingContainer
{
    public function __construct(private array $data = [])
    {}

    public function add(ContractBooking $registeredCurrency)
    {
        $this->data[] = $registeredCurrency;
    }

    public function getData(): array
    {
        return $this->data;
    }
}