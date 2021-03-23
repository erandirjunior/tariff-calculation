<?php

namespace SRC\Booking\Domain\Find;

use SRC\Booking\Domain\ContractBooking;

interface Presenter
{
    public function setData(ContractBooking $coin): void;
}