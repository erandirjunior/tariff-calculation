<?php

namespace SRC\RoomCoin\Adapters\Gateways;

interface FindAllUnit
{
    public function find(int $roomId): array;
}