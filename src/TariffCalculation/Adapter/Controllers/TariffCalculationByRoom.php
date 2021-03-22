<?php

namespace SRC\TariffCalculation\Adapter\Controllers;

use SRC\TariffCalculation\Adapter\Gateways\GetCurrentExchangeValue;
use SRC\TariffCalculation\Adapter\Presenters\PresenterByRoom;
use SRC\TariffCalculation\Domain\TariffPrice;

class TariffCalculationByRoom
{
    public function __construct(
        private PresenterByRoom $presenterByRoom,
        private GetCurrentExchangeValue $getCurrentExchangeValue,
        private \SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoom $tariffCalculationByRoom
    )
    {
    }

    public function handle(int $fromCoinId, int $toCoinId, int $roomId, int $sellerId)
    {
        $domain = new \SRC\TariffCalculation\Domain\TariffCalculationByRoom(
            $this->tariffCalculationByRoom,
            $this->getCurrentExchangeValue,
            $this->presenterByRoom
        );

        $domain->calculate($roomId, $fromCoinId, $toCoinId, $sellerId);
    }
}