<?php

namespace SRC\Seller\Domain\Find;

use SRC\Seller\Domain\RegisteredSeller;

interface Presenter
{
    public function setData(RegisteredSeller $registeredSeller): void;
}