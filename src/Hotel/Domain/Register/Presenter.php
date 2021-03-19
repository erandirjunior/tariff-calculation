<?php

namespace SRC\Hotel\Domain\Register;

use SRC\Hotel\Domain\RegisteredHotel;

interface Presenter
{
    public function addData(RegisteredHotel $registeredHotel): void;
}