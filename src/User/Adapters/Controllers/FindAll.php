<?php

namespace SRC\User\Adapters\Controllers;

use SRC\User\Domain\Find\FinderAll;

class FindAll
{
    public function __construct(
        private \SRC\User\Adapters\Gateways\FindAll $repository,
        private \SRC\User\Adapters\Presenters\FindAll $presenter
    )
    {}

    public function handle()
    {
        $domain = new FinderAll($this->repository, $this->presenter);
        $domain->find();
    }
}