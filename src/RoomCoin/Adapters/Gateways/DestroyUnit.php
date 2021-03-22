<?php

namespace SRC\RoomCoin\Adapters\Gateways;

interface DestroyUnit
{
    public function destroy(int $roomId, int $id): bool;
}