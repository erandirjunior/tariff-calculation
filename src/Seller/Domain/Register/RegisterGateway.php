<?php

namespace SRC\Seller\Domain\Register;

use SRC\Seller\Domain\RegisteredSeller;

interface RegisterGateway
{
    public function register(Seller $seller): RegisteredSeller;

    public function checkIfNameIsInUse(string $name): bool;
}