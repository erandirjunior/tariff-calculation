<?php

namespace SRC\Booking\Domain\Find;

interface FinderAllPresenter
{
    public function setData(BookingContainer $currencyContainer): void;
}