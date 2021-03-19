<?php

namespace SRC\Hotel\Adapters\Controllers;

use SRC\Hotel\Domain\Register\Hotel;

class Register
{
    public function __construct(
        private \SRC\Hotel\Adapters\Presenters\Register $presenter,
        private \SRC\Hotel\Adapters\Gateways\Register $registerGateway,
    )
    {}

    public function handle(string $name)
    {
        $domain = new \SRC\Hotel\Domain\Register\Register(
            $this->registerGateway,
            $this->presenter
        );
        $money = new Hotel($name);

        $domain->register($money);
    }
}