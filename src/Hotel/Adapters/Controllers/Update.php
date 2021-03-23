<?php

namespace SRC\Hotel\Adapters\Controllers;

use SRC\Hotel\Domain\RegisteredHotel;
use SRC\Hotel\Domain\Update\Updater;

class Update
{
    public function __construct(
        private \SRC\Hotel\Adapters\Gateways\Update $updaterGateway
    )
    {
    }

    public function handle(string $name, int $id)
    {
        $domain = new Updater($this->updaterGateway);
        $currency = new RegisteredHotel($name, $id);
        $domain->update($currency);
    }
}