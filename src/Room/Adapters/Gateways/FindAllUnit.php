<?php

namespace SRC\Room\Adapters\Gateways;

interface FindAllUnit
{
    public function find(int $hotelId): array;
}