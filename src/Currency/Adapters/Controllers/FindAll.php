<?php

namespace SRC\Currency\Adapters\Controllers;

use SRC\Currency\Domain\Find\FinderAll;

class FindAll
{
    public function __construct(
        private \SRC\Currency\Adapters\Gateways\FindAll $repository,
        private \SRC\Currency\Adapters\Presenters\FindAll $presenter
    )
    {}

    public function handle()
    {
        $domain = new FinderAll($this->repository, $this->presenter);
        $domain->find();
    }
}