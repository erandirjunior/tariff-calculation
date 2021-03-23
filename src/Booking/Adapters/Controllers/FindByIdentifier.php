<?php

namespace SRC\Booking\Adapters\Controllers;

use SRC\Booking\Domain\Find\FinderByIdentifier;
use SRC\Booking\Domain\Find\FinderByIdentifierGateway;
use SRC\Booking\Domain\Find\Presenter;

class FindByIdentifier
{
    public function __construct(
        private Presenter $presenter,
        private FinderByIdentifierGateway $finderByIdentifierGateway
    )
    {}

    public function handle(int $userId, int $id)
    {
        $domain = new FinderByIdentifier($this->finderByIdentifierGateway, $this->presenter);
        $domain->find($userId, $id);
    }
}