<?php

namespace SRC\RoomCoin\Adapters\Gateways;

interface FindByIdentifierUnit
{
    public function find(int $roomId, int $id): array;
}