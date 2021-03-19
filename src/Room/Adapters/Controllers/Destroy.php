<?php

namespace SRC\Room\Adapters\Controllers;

class Destroy
{
    public function __construct(
        private \SRC\Room\Adapters\Gateways\Destroy $repository,
    )
    {}

    public function handle(int $hotelId, int $id)
    {
        $domain = new \SRC\Room\Domain\Destruction\Destroyer(
            $this->repository
        );

        $domain->destroy($hotelId, $id);
    }
}