<?php

namespace SRC\Booking\Adapters\Controllers;

class Destroy
{
    public function __construct(
        private \SRC\Booking\Adapters\Gateways\Destroy $repository,
    )
    {
    }

    public function handle(int $id)
    {
        $domain = new \SRC\Booking\Domain\Destruction\Destroyer(
            $this->repository
        );

        $domain->destroy($id);
    }
}