<?php

namespace SRC\Booking\Adapters\Controllers;

use SRC\Booking\Domain\Find\FinderAll;

class FindAll
{
    public function __construct(
        private \SRC\Booking\Adapters\Gateways\FindAll $repository,
        private \SRC\Booking\Adapters\Presenters\FindAll $presenter
    )
    {}

    public function handle(int $userId)
    {
        $domain = new FinderAll($this->repository, $this->presenter);
        $domain->find($userId);
    }
}