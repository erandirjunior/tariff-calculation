<?php

namespace SRC\Coin\Adapters\Controllers;

use SRC\Coin\Domain\Register\Coin;

class Register
{
    public function __construct(
        private \SRC\Coin\Adapters\Presenters\Register $presenter,
        private \SRC\Coin\Adapters\Gateways\Register $registerGateway,
    )
    {}

    public function handle(string $money, float $profitMargin)
    {
        $domain = new \SRC\Coin\Domain\Register\Register(
            $this->registerGateway,
            $this->presenter
        );
        $money = new Coin($money, $profitMargin);

        $domain->register($money);
    }
}