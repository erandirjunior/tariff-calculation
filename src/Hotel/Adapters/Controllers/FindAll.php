<?php

namespace SRC\Hotel\Adapters\Controllers;

use SRC\Hotel\Domain\Find\FinderAll;

class FindAll
{
    public function __construct(
        private \SRC\Hotel\Adapters\Gateways\FindAll $repository,
        private \SRC\Hotel\Adapters\Presenters\FindAll $presenter
    )
    {}

    public function handle()
    {
        $domain = new FinderAll($this->repository, $this->presenter);
        $domain->find();
    }
}