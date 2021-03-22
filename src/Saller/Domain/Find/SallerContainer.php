<?php

namespace SRC\Saller\Domain\Find;

use SRC\Saller\Domain\RegisteredSaller;

class SallerContainer
{
    public function __construct(private array $data = [])
    {}

    public function add(RegisteredSaller $registeredSaller)
    {
        $this->data[] = $registeredSaller;
    }

    public function getData(): array
    {
        return $this->data;
    }
}