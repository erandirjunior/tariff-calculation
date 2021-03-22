<?php

namespace SRC\Seller\Adapters\Controllers;

use SRC\Seller\Domain\Register\Seller;

class Register
{
    public function __construct(
        private \SRC\Seller\Adapters\Presenters\Register $presenter,
        private \SRC\Seller\Adapters\Gateways\Register $registerGateway,
    )
    {}

    public function handle(string $name, float $profitMargin)
    {
        $domain = new \SRC\Seller\Domain\Register\Register(
            $this->registerGateway,
            $this->presenter
        );
        $seller = new Seller($name, $profitMargin);

        $domain->register($seller);
    }
}