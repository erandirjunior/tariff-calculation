<?php

namespace SRC\Saller\Adapters\Controllers;

use SRC\Saller\Domain\Register\Saller;

class Register
{
    public function __construct(
        private \SRC\Saller\Adapters\Presenters\Register $presenter,
        private \SRC\Saller\Adapters\Gateways\Register $registerGateway,
    )
    {}

    public function handle(string $name, float $profitMargin)
    {
        $domain = new \SRC\Saller\Domain\Register\Register(
            $this->registerGateway,
            $this->presenter
        );
        $saller = new Saller($name, $profitMargin);

        $domain->register($saller);
    }
}