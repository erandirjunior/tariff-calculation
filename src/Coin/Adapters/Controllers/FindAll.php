<?php

namespace SRC\Coin\Adapters\Controllers;

use SRC\Coin\Domain\Find\FinderAll;

class FindAll
{
    public function __construct(
        private \SRC\Coin\Adapters\Gateways\FindAll $repository,
        private \SRC\Coin\Adapters\Presenters\FindAll $presenter
    )
    {}

    public function handle()
    {
        $domain = new FinderAll($this->repository, $this->presenter);
        $domain->find();
    }
}