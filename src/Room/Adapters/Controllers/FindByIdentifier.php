<?php

namespace SRC\Room\Adapters\Controllers;

use SRC\Room\Domain\Find\FinderByIdentifier;
use SRC\Room\Domain\Find\FinderByIdentifierGateway;
use SRC\Room\Domain\Find\Presenter;

class FindByIdentifier
{
    public function __construct(
        private Presenter $presenter,
        private FinderByIdentifierGateway $finderByIdentifierGateway
    )
    {}

    public function handle(int $hotelId, int $id)
    {
        $domain = new FinderByIdentifier($this->finderByIdentifierGateway, $this->presenter);
        $domain->find($hotelId, $id);
    }
}