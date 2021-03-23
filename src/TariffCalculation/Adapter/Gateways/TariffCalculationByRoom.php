<?php

namespace SRC\TariffCalculation\Adapter\Gateways;

use SRC\TariffCalculation\Domain\TariffCalculationByRoomGateway;

class TariffCalculationByRoom implements TariffCalculationByRoomGateway
{
    public function __construct(
        private TariffCalculationByRoomUnit $tariffCalculationByRoomUnit
    )
    {}

    public function getRoomPriceByCurrency(int $roomId, int $currencyId, int $hotelId): float
    {
        $content = $this->tariffCalculationByRoomUnit->getRoomPriceByCurrency($roomId, $currencyId, $hotelId);

        if (!$content) {
            throw new \InvalidArgumentException('Room price not found!');
        }

        return $content['price'];
    }

    public function getProfitMargin(int $currencyId): float
    {
        $content = $this->tariffCalculationByRoomUnit->getProfitMarginByCurrencyRequested($currencyId);

        if (!$content) {
            throw new \InvalidArgumentException('Profit Margin not found to currency requested!');
        }

        return $content['profit_margin'];
    }

    public function getMoney(int $currencyId): string
    {
        $content = $this->tariffCalculationByRoomUnit->getCurrency($currencyId);

        if (!$content) {
            throw new \DomainException('Currency not found to currency requested!');
        }

        return $content['currency'];
    }

    public function getSellerProfitMargin(int $sellerId): float
    {
        $content = $this->tariffCalculationByRoomUnit->getSellerProfitMargin($sellerId);

        if (!$content) {
            throw new \InvalidArgumentException('Profit Margin not found to seller requested!');
        }

        return $content['profit_margin'];
    }
}