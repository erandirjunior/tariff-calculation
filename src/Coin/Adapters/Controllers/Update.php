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

    public function handle(string $money, float $profitMargin, int $id)
    {
        $domain = new Updater($this->updaterGateway);
        $coin = new RegisteredCoin($money, $profitMargin, $id);
        $domain->update($coin);
    }
}