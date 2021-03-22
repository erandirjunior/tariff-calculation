<?php

namespace SRC\RoomCoin\Adapters\Gateways;

use SRC\RoomCoin\Domain\Destruction\DestroyerGateway;

class Destroy implements DestroyerGateway
{
    public function __construct(private DestroyUnit $destructionUnit)
    {}

    public function destroy(int $roomId, int $id): bool
    {
        return $this->destructionUnit->destroy($roomId, $id);
    }
}