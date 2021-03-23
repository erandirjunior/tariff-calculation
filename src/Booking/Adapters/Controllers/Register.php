<?php

namespace SRC\Booking\Adapters\Controllers;

use SRC\Booking\Domain\Register\Booking;

class Register
{
    public function __construct(
        private \SRC\Booking\Adapters\Presenters\Register $presenter,
        private \SRC\Booking\Adapters\Gateways\Register $registerGateway,
        private \SRC\Booking\Adapters\Gateways\TariffCalculationGateway $tariffCalculationGateway,
    )
    {}

    public function handle(array $data, int $userId)
    {
        $domain = new \SRC\Booking\Domain\Register\Register(
            $this->registerGateway,
            $this->presenter,
            $this->tariffCalculationGateway
        );
        $money = new Booking(
            $data['currencyBase'],
            $data['userCurrencyNeed'],
            $data['roomId'],
            $userId,
            $data['sellerId'],
            $data['hotelId']
        );

        $domain->register($money);
    }
}