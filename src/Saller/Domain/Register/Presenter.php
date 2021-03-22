<?php

namespace SRC\Saller\Domain\Register;

use SRC\Saller\Domain\RegisteredSaller;

interface Presenter
{
    public function addData(RegisteredSaller $registeredSaller): void;
}