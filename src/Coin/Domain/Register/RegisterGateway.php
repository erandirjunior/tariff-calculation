<?php

namespace SRC\Coin\Domain\Register;

use SRC\Coin\Domain\RegisteredCoin;

interface RegisterGateway
{
    public function register(Coin $coin): RegisteredCoin;

    public function checkIfMoneyIsInUse(string $money): bool;
}