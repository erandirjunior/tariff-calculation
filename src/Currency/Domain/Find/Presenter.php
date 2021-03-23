<?php

namespace SRC\Currency\Domain\Find;

use SRC\Currency\Domain\RegisteredCurrency;

interface Presenter
{
    public function setData(RegisteredCurrency $registeredCurrency): void;
}