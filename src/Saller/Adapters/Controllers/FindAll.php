<?php

namespace SRC\Saller\Adapters\Controllers;

use SRC\Saller\Domain\Find\FinderAll;

class FindAll
{
    public function __construct(
        private \SRC\Saller\Adapters\Gateways\FindAll $repository,
        private \SRC\Saller\Adapters\Presenters\FindAll $presenter
    )
    {}

    public function handle()
    {
        $domain = new FinderAll($this->repository, $this->presenter);
        $domain->find();
    }
}