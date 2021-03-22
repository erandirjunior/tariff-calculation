<?php

namespace SRC\Seller\Adapters\Controllers;

class Destroy
{
    public function __construct(
        private \SRC\Seller\Adapters\Gateways\Destroy $repository,
    )
    {
    }

    public function handle(int $id)
    {
        $domain = new \SRC\Seller\Domain\Destruction\Destroyer(
            $this->repository
        );

        $domain->destroy($id);
    }
}