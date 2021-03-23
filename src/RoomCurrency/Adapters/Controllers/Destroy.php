<?php

namespace SRC\RoomCoin\Adapters\Controllers;

class Destroy
{
    public function __construct(
        private \SRC\RoomCoin\Adapters\Gateways\Destroy $repository,
    )
    {}

    public function handle(int $roomId, int $id, int $hotelId)
    {
        $domain = new \SRC\RoomCoin\Domain\Destruction\Destroyer(
            $this->repository
        );

        $domain->destroy($roomId, $id, $hotelId);
    }
}