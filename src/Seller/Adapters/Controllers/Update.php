<?php

namespace SRC\Seller\Adapters\Controllers;

use SRC\Seller\Domain\RegisteredSeller;
use SRC\Seller\Domain\Update\Updater;

class Update
{
    public function __construct(
        private \SRC\Seller\Adapters\Gateways\Update $updaterGateway
    )
    {
    }

    public function handle(string $name, float $profitMargin, int $id)
    {
        $domain = new Updater($this->updaterGateway);
        $seller = new RegisteredSeller($name, $profitMargin, $id);
        $domain->update($seller);
    }
}