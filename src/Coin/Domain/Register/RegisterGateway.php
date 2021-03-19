<?php

namespace SRC\Coin\Domain\Register;

use SRC\Coin\Domain\RegisteredCoin;

interface RegisterGateway
{
    public function register(Coin $money): RegisteredCoin;

    public function checkIfMoneyIsInUse(string $name): bool;
}