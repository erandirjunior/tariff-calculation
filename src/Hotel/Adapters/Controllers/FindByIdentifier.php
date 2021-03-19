<?php

namespace SRC\Hotel\Adapters\Controllers;

use SRC\Hotel\Domain\Find\FinderByIdentifier;
use SRC\Hotel\Domain\Find\FinderByIdentifierGateway;
use SRC\Hotel\Domain\Find\Presenter;

class FindByIdentifier
{
    public function __construct(
        private Presenter $presenter,
        private FinderByIdentifierGateway $finderByIdentifierGateway
    )
    {}

    public function handle(int $id)
    {
        $domain = new FinderByIdentifier($this->finderByIdentifierGateway, $this->presenter);
        $domain->find($id);
    }
}