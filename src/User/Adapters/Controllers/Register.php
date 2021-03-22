<?php

namespace SRC\User\Adapters\Controllers;

use SRC\User\Domain\Register\User;

class Register
{
    public function __construct(
        private \SRC\User\Adapters\Presenters\Register $presenter,
        private \SRC\User\Adapters\Gateways\Register $registerGateway,
    )
    {}

    public function handle(string $name, string $email)
    {
        $domain = new \SRC\User\Domain\Register\Register(
            $this->registerGateway,
            $this->presenter
        );
        $user = new User($name, $email);

        $domain->register($user);
    }
}