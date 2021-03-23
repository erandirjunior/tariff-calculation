<?php

namespace SRC\RoomCurrency\Adapters\Controllers;

use SRC\RoomCurrency\Domain\Find\FinderByIdentifier;
use SRC\RoomCurrency\Domain\Find\FinderByIdentifierGateway;
use SRC\RoomCurrency\Domain\Find\Presenter;

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