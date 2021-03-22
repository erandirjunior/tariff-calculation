<?php

namespace SRC\Saller\Domain\Find;

use SRC\Saller\Domain\RegisteredSaller;

interface Presenter
{
    public function setData(RegisteredSaller $registeredSaller): void;
}