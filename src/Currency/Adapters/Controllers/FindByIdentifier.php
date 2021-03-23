<?php

namespace SRC\Currency\Adapters\Controllers;

use SRC\Currency\Domain\Find\FinderByIdentifier;
use SRC\Currency\Domain\Find\FinderByIdentifierGateway;
use SRC\Currency\Domain\Find\Presenter;

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