<?php

namespace SRC\Saller\Adapters\Controllers;

use SRC\Saller\Domain\RegisteredSaller;
use SRC\Saller\Domain\Update\Updater;

class Update
{
    public function __construct(
        private \SRC\Saller\Adapters\Gateways\Update $updaterGateway
    )
    {
    }

    public function handle(string $name, float $profitMargin, int $id)
    {
        $domain = new Updater($this->updaterGateway);
        $saller = new RegisteredSaller($name, $profitMargin, $id);
        $domain->update($saller);
    }
}