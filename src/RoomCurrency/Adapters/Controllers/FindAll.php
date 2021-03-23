<?php

namespace SRC\RoomCurrency\Adapters\Controllers;

use SRC\RoomCurrency\Domain\Find\FinderAll;

class FindAll
{
    public function __construct(
        private \SRC\RoomCurrency\Adapters\Gateways\FindAll $repository,
        private \SRC\RoomCurrency\Adapters\Presenters\FindAll $presenter
    )
    {}

    public function handle(int $roomId, int $hotelId)
    {
        $domain = new FinderAll($this->repository, $this->presenter);
        $domain->find($roomId, $hotelId);
    }
}