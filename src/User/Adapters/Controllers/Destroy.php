<?php

namespace SRC\User\Adapters\Controllers;

class Destroy
{
    public function __construct(
        private \SRC\User\Adapters\Gateways\Destroy $repository,
    )
    {
    }

    public function handle(int $id)
    {
        $domain = new \SRC\User\Domain\Destruction\Destroyer(
            $this->repository
        );

        $domain->destroy($id);
    }
}