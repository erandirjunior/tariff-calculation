<?php

namespace SRC\RoomCoin\Domain\Destruction;

interface DestroyerGateway
{
    public function destroy(int $roomId, int $id, int $hotelId): bool;
}