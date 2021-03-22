<?php

namespace SRC\Saller\Adapters\Controllers;

class Destroy
{
    public function __construct(
        private \SRC\Saller\Adapters\Gateways\Destroy $repository,
    )
    {
    }

    public function handle(int $id)
    {
        $domain = new \SRC\Saller\Domain\Destruction\Destroyer(
            $this->repository
        );

        $domain->destroy($id);
    }
}