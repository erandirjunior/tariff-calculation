<?php

namespace SRC\Booking\Infra\Factory;

use SRC\Booking\Adapters\Gateways\TariffCalculationGatewayUnit;
use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeValue;
use SRC\TariffCalculation\Adapter\Presenters\PresenterByRoom;

class TariffCalculationFactory implements TariffCalculationGatewayUnit
{
    public function __construct(
        private PresenterByRoom $presenterByRoom,
        private GetCurrentExchangeValue $getCurrentExchangeValue,
        private \SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoom $tariffCalculationByRoom
    )
    {}

    public function calculate(int $currencyBase, int $userCurrencyNeed, int $roomId, int $sellerId, int $hotelId): float
    {
        $controller = new \SRC\TariffCalculation\Adapter\Controllers\TariffCalculationByRoom(
            $this->presenterByRoom,
            $this->getCurrentExchangeValue,
            $this->tariffCalculationByRoom
        );

        $controller->handle($currencyBase, $userCurrencyNeed, $roomId, $sellerId, $hotelId);
        return $this->presenterByRoom->getData()['price'];
    }
}