<?php

namespace SRC\RoomCurrency\Adapters\Gateways;

use SRC\RoomCurrency\Domain\Destruction\DestroyerGateway;

class Destroy implements DestroyerGateway
{
    public function __construct(private DestroyUnit $destructionUnit)
    {}

    public function destroy(int $roomId, int $id, int $hotelId): bool
    {
        return $this->destructionUnit->destroy($roomId, $id, $hotelId);
    }
}