<?php

namespace SRC\Seller\Domain\Register;

use SRC\Seller\Domain\RegisteredSeller;

interface Presenter
{
    public function addData(RegisteredSeller $registeredSeller): void;
}