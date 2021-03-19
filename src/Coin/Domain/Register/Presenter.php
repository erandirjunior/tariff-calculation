<?php

namespace SRC\Coin\Domain\Register;

use SRC\Coin\Domain\RegisteredCoin;

interface Presenter
{
    public function addData(RegisteredCoin $registeredMoney): void;
}