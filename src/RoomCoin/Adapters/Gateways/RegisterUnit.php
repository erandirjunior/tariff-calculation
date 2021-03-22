<?php

namespace SRC\RoomCoin\Adapters\Gateways;

interface RegisterUnit
{
    public function register(int $roomId, int $coinId, float $price): int;

    public function roomPrice(int $roomId, int $coinId): bool;

    public function find(int $roomId, int $id): array;
}