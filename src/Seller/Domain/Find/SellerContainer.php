<?php

namespace SRC\Seller\Domain\Find;

use SRC\Seller\Domain\RegisteredSeller;

class SellerContainer
{
    public function __construct(private array $data = [])
    {}

    public function add(RegisteredSeller $registeredSeller)
    {
        $this->data[] = $registeredSeller;
    }

    public function getData(): array
    {
        return $this->data;
    }
}