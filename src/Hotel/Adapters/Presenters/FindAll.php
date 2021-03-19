<?php

namespace SRC\Hotel\Adapters\Presenters;

use SRC\Hotel\Domain\Find\FinderAllPresenter;
use SRC\Hotel\Domain\Find\HotelContainer;

class FindAll implements FinderAllPresenter
{
    public function __construct(private FindAllVM $findAllVM)
    {}

    public function setData(HotelContainer $hotelContainer): void
    {
        foreach ($hotelContainer->getData() as $hotel) {
            $this->findAllVM->setData($hotel->getName(), $hotel->getId());
        }
    }

    public function getData(): array
    {
        return $this->findAllVM->getData();
    }
}