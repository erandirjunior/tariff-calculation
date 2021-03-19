<?php

namespace SRC\Coin\Adapters\Controllers;

use SRC\Coin\Domain\Find\FinderByIdentifier;
use SRC\Coin\Domain\Find\FinderByIdentifierGateway;
use SRC\Coin\Domain\Find\Presenter;

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