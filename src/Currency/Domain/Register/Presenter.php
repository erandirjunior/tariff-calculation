<?php

namespace SRC\Currency\Domain\Register;

use SRC\Currency\Domain\RegisteredCurrency;

interface Presenter
{
    public function addData(RegisteredCurrency $registeredCurrency): void;
}