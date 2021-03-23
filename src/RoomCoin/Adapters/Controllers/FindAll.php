<?php

namespace SRC\RoomCoin\Adapters\Controllers;

use SRC\RoomCoin\Domain\Find\FinderAll;

class FindAll
{
    public function __construct(
        private \SRC\RoomCoin\Adapters\Gateways\FindAll $repository,
        private \SRC\RoomCoin\Adapters\Presenters\FindAll $presenter
    )
    {}

    public function handle(int $roomId, int $hotelId)
    {
        $domain = new FinderAll($this->repository, $this->presenter);
        $domain->find($roomId, $hotelId);
    }
}