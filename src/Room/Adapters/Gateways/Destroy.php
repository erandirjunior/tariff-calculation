<?php

namespace SRC\Room\Adapters\Gateways;

use SRC\Room\Domain\Destruction\DestroyerGateway;

class Destroy implements DestroyerGateway
{
    public function __construct(private DestroyUnit $destructionUnit)
    {}

    public function destroy(int $hotelId, int $id): bool
    {
        return $this->destructionUnit->destroy($hotelId, $id);
    }
}