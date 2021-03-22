<?php

namespace SRC\Saller\Adapters\Controllers;

use SRC\Saller\Domain\Find\FinderByIdentifier;
use SRC\Saller\Domain\Find\FinderByIdentifierGateway;
use SRC\Saller\Domain\Find\Presenter;

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