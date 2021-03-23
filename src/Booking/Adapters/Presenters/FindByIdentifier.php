<?php

namespace SRC\Booking\Adapters\Presenters;

use SRC\Booking\Domain\Find\Presenter;
use SRC\Booking\Domain\ContractBooking;

class FindByIdentifier implements Presenter
{
    public function __construct(private FindByIdentifierVM $findByCodeVM)
    {}

    public function setData(ContractBooking $contractBooking): void
    {
        $this->findByCodeVM->setData([
            'currencyBase' => $contractBooking->getCurrencyBase(),
            'userCurrencyNeed' => $contractBooking->getUserCurrencyNeed(),
            'roomId' => $contractBooking->getRoomId(),
            'userId' => $contractBooking->getUserId(),
            'sellerId' => $contractBooking->getSellerId(),
            'hotelId' => $contractBooking->getHotelId(),
            'date' => $contractBooking->getDate(),
            'id' => $contractBooking->getId(),
            'price' => $contractBooking->getPrice()
        ]);
    }

    public function getData(): array
    {
        return $this->findByCodeVM->getData();
    }
}