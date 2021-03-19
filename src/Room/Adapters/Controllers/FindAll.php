<?php

namespace SRC\Room\Adapters\Controllers;

use SRC\Room\Domain\Find\FinderAll;

class FindAll
{
    public function __construct(
        private \SRC\Room\Adapters\Gateways\FindAll $repository,
        private \SRC\Room\Adapters\Presenters\FindAll $presenter
    )
    {}

    public function handle(int $hotelId)
    {
        $domain = new FinderAll($this->repository, $this->presenter);
        $domain->find($hotelId);
    }
}