<?php

namespace SRC\Seller\Adapters\Controllers;

use SRC\Seller\Domain\Find\FinderAll;

class FindAll
{
    public function __construct(
        private \SRC\Seller\Adapters\Gateways\FindAll $repository,
        private \SRC\Seller\Adapters\Presenters\FindAll $presenter
    )
    {}

    public function handle()
    {
        $domain = new FinderAll($this->repository, $this->presenter);
        $domain->find();
    }
}