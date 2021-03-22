<?php

namespace SRC\RoomCoin\Adapters\Controllers;

use SRC\RoomCoin\Domain\Find\FinderAllByHotel;

class FindAllByHotel
{
    public function __construct(
        private \SRC\RoomCoin\Adapters\Gateways\FindAllByHotel $repository,
        private \SRC\RoomCoin\Adapters\Presenters\FindAllByHotel $presenter
    )
    {}

    public function handle(int $hotelId)
    {
        $domain = new FinderAllByHotel($this->repository, $this->presenter);
        $domain->find($hotelId);
    }
}