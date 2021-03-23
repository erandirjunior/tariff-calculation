<?php

namespace SRC\TariffCalculation\Adapter\Controllers;

use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeValue;
use SRC\TariffCalculation\Adapter\Presenters\PresenterByRoom;
use SRC\TariffCalculation\Domain\Tariff;

class TariffCalculationByRoom
{
    public function __construct(
        private PresenterByRoom $presenterByRoom,
        private GetCurrentExchangeValue $getCurrentExchangeValue,
        private \SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoom $tariffCalculationByRoom
    )
    {}

    public function handle(
        int $coinBase,
        int $userCoinNeed,
        int $roomId,
        int $sellerId
    )
    {
        $domain = new \SRC\TariffCalculation\Domain\TariffCalculationByRoom(
            $this->tariffCalculationByRoom,
            $this->getCurrentExchangeValue,
            $this->presenterByRoom
        );
        $tariff = new Tariff($userCoinNeed, $coinBase, $roomId, $sellerId);
        $domain->calculate($tariff);
    }
}