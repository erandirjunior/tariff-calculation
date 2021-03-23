<?php

namespace SRC\Booking\Adapters\Presenters;

use SRC\Booking\Domain\Register\Presenter;
use SRC\Booking\Domain\ContractBooking;

class Register implements Presenter
{
    public function __construct(private RegisterVM $registerVM)
    {}

    public function addData(ContractBooking $contractBooking): void
    {
        $content = [
            'userCurrencyNeed' => $contractBooking->getUserCurrencyNeed(),
            'currencyBase' => $contractBooking->getCurrencyBase(),
            'roomId' => $contractBooking->getRoomId(),
            'userId' => $contractBooking->getUserId(),
            'sellerId' => $contractBooking->getSellerId(),
            'hotelId' => $contractBooking->getHotelId(),
            'created' => $contractBooking->getDate(),
            'price' => $contractBooking->getPrice(),
            'id' => $contractBooking->getId(),
        ];

        $this->registerVM->setData($content);
    }

    public function getData(): array
    {
        return $this->registerVM->getData();
    }
}