<?php

namespace SRC\Hotel\Domain\Find;

use SRC\Hotel\Domain\RegisteredHotel;

interface Presenter
{
    public function setData(RegisteredHotel $registeredHotel): void;
}