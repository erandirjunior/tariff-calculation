<?php

namespace SRC\User\Domain\Register;

use SRC\User\Domain\RegisteredUser;

interface RegisterGateway
{
    public function register(User $user): RegisteredUser;

    public function checkIfEmailIsInUse(string $email): bool;
}