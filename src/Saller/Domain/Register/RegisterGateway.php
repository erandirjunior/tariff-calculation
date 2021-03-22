<?php

namespace SRC\Saller\Domain\Register;

use SRC\Saller\Domain\RegisteredSaller;

interface RegisterGateway
{
    public function register(Saller $saller): RegisteredSaller;

    public function checkIfNameIsInUse(string $name): bool;
}