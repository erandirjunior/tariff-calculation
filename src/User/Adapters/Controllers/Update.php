<?php

namespace SRC\User\Adapters\Controllers;

use SRC\User\Domain\RegisteredUser;
use SRC\User\Domain\Update\Updater;

class Update
{
    public function __construct(
        private \SRC\User\Adapters\Gateways\Update $updaterGateway
    )
    {
    }

    public function handle(string $name, string $email, int $id)
    {
        $domain = new Updater($this->updaterGateway);
        $user = new RegisteredUser($name, $email, $id);
        $domain->update($user);
    }
}