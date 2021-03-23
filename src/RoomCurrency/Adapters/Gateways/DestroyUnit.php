<?php

namespace SRC\RoomCurrency\Adapters\Gateways;

interface DestroyUnit
{
    public function destroy(int $roomId, int $id, int $hotelId): bool;
}