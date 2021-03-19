<?php

namespace SRC\Coin\Domain\Find;

use SRC\Coin\Domain\RegisteredCoin;

interface Presenter
{
    public function setData(RegisteredCoin $coin): void;
}