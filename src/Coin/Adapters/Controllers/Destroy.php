<?php

namespace SRC\Coin\Adapters\Controllers;

class Destroy
{
    public function __construct(
        private \SRC\Coin\Adapters\Gateways\Destroy $repository,
    )
    {
    }

    public function handle(int $id)
    {
        $domain = new \SRC\Coin\Domain\Destruction\Destroyer(
            $this->repository
        );

        $domain->destroy($id);
    }
}