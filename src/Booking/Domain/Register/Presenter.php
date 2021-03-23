<?php

namespace SRC\Booking\Domain\Register;

use SRC\Booking\Domain\ContractBooking;

interface Presenter
{
    public function addData(ContractBooking $registeredMoney): void;
}