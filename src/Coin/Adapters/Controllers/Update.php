<?php

namespace SRC\Coin\Adapters\Controllers;

use SRC\Coin\Domain\RegisteredCoin;
use SRC\Coin\Domain\Update\Updater;

class Update
{
    public function __construct(
        private \SRC\Coin\Adapters\Gateways\Update $updaterGateway
    )
    {
    }

    public function handle(string $coin, float $profitMargin, int $id)
    {
        $domain = new Updater($this->updaterGateway);
        $coin = new RegisteredCoin($coin, $profitMargin, $id);
        $domain->update($coin);
    }
}