<?php

namespace SRC\RoomCoin\Adapters\Controllers;

use SRC\RoomCoin\Domain\Find\FinderByIdentifier;
use SRC\RoomCoin\Domain\Find\FinderByIdentifierGateway;
use SRC\RoomCoin\Domain\Find\Presenter;

class FindByIdentifier
{
    public function __construct(
        private Presenter $presenter,
        private FinderByIdentifierGateway $finderByIdentifierGateway
    )
    {}

    public function handle(int $roomId, int $id, int $hotelId)
    {
        $domain = new FinderByIdentifier($this->finderByIdentifierGateway, $this->presenter);
        $domain->find($roomId, $id, $hotelId);
    }
}