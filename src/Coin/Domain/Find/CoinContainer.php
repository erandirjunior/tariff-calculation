<?php

namespace SRC\Hotel\Domain\Find;

use SRC\Hotel\Domain\RegisteredHotel;

class CoinContainer
{
    public function __construct(private array $data = [])
    {}

    public function add(RegisteredHotel $registeredHotel)
    {
        $this->data[] = $registeredHotel;
    }

    public function getData(): array
    {
        return $this->data;
    }
}