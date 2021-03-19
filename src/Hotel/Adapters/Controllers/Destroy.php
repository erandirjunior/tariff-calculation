<?php

namespace SRC\Hotel\Adapters\Controllers;

class Destroy
{
    public function __construct(
        private \SRC\Hotel\Adapters\Gateways\Destroy $repository,
    )
    {
    }

    public function handle(int $id)
    {
        $domain = new \SRC\Hotel\Domain\Destruction\Destroyer(
            $this->repository
        );

        $domain->destroy($id);
    }
}