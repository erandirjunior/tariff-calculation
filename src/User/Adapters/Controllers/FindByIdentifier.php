<?php

namespace SRC\User\Adapters\Controllers;

use SRC\User\Domain\Find\FinderByIdentifier;
use SRC\User\Domain\Find\FinderByIdentifierGateway;
use SRC\User\Domain\Find\Presenter;

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