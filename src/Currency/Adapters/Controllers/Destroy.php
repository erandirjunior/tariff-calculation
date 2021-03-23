<?php

namespace SRC\Currency\Adapters\Controllers;

class Destroy
{
    public function __construct(
        private \SRC\Currency\Adapters\Gateways\Destroy $repository,
    )
    {
    }

    public function handle(int $id)
    {
        $domain = new \SRC\Currency\Domain\Destruction\Destroyer(
            $this->repository
        );

        $domain->destroy($id);
    }
}