<?php

namespace SRC\RoomCurrency\Adapters\Controllers;

class Destroy
{
    public function __construct(
        private \SRC\RoomCurrency\Adapters\Gateways\Destroy $repository,
    )
    {}

    public function handle(int $roomId, int $id, int $hotelId)
    {
        $domain = new \SRC\RoomCurrency\Domain\Destruction\Destroyer(
            $this->repository
        );

        $domain->destroy($roomId, $id, $hotelId);
    }
}