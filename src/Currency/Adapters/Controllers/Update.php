<?php

namespace SRC\Currency\Adapters\Controllers;

use SRC\Currency\Domain\RegisteredCurrency;
use SRC\Currency\Domain\Update\Updater;

class Update
{
    public function __construct(
        private \SRC\Currency\Adapters\Gateways\Update $updaterGateway
    )
    {}

    public function handle(string $currency, float $profitMargin, int $id)
    {
        $domain = new Updater($this->updaterGateway);
        $currency = new RegisteredCurrency($currency, $profitMargin, $id);
        $domain->update($currency);
    }
}