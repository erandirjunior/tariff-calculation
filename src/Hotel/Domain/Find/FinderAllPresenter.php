<?php

namespace SRC\Hotel\Domain\Find;

interface FinderAllPresenter
{
    public function setData(HotelContainer $hotelContainer): void;
}