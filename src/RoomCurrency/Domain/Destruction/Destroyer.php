<?php

namespace SRC\RoomCoin\Domain\Destruction;

class Destroyer
{
    public function __construct(
        private DestroyerGateway $destroyerGateway
    )
    {}

    public function destroy(int $roomId, int $id, int $hotelId): void
    {
        $this->destroyerGateway->destroy($roomId, $id, $hotelId);
    }
}