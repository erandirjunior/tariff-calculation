<?php

namespace SRC\Booking\Adapters\Presenters;

use SRC\Booking\Domain\Find\BookingContainer;
use SRC\Booking\Domain\Find\FinderAllPresenter;

class FindAll implements FinderAllPresenter
{
    public function __construct(private FindAllVM $findAllVM)
    {}

    public function setData(BookingContainer $bookingContainer): void
    {
        if (!$bookingContainer->getData()) {
            $this->findAllVM->setData([]);
            return;
        }

        foreach ($bookingContainer->getData() as $contract) {
            $this->findAllVM->setData([
                'currencyBase' => $contract->getCurrencyBase(),
                'userCurrencyNeed' => $contract->getUserCurrencyNeed(),
                'roomId' => $contract->getRoomId(),
                'userId' => $contract->getUserId(),
                'sellerId' => $contract->getSellerId(),
                'hotelId' => $contract->getHotelId(),
                'date' => $contract->getDate(),
                'id' => $contract->getId(),
                'price' => $contract->getPrice()
            ]);
        }
    }

    public function getData(): array
    {
        return $this->findAllVM->getData();
    }
}