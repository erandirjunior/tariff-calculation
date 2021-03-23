<?php

namespace SRC\Currency\Adapters\Controllers;

use SRC\Currency\Domain\Register\Currency;

class Register
{
    public function __construct(
        private \SRC\Currency\Adapters\Presenters\Register $presenter,
        private \SRC\Currency\Adapters\Gateways\Register $registerGateway,
    )
    {}

    public function handle(string $currency, float $profitMargin)
    {
        $domain = new \SRC\Currency\Domain\Register\Register(
            $this->registerGateway,
            $this->presenter
        );
        $currency = new Currency($currency, $profitMargin);

        $domain->register($currency);
    }
}