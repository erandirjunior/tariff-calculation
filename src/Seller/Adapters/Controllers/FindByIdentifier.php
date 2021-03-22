<?php

namespace SRC\Seller\Adapters\Controllers;

use SRC\Seller\Domain\Find\FinderByIdentifier;
use SRC\Seller\Domain\Find\FinderByIdentifierGateway;
use SRC\Seller\Domain\Find\Presenter;

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