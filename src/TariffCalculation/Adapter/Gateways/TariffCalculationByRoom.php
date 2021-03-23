<?php

namespace SRC\TariffCalculation\Adapter\Gateways;

use SRC\TariffCalculation\Domain\TariffCalculationByRoomGateway;

class TariffCalculationByRoom implements TariffCalculationByRoomGateway
{
    public function __construct(
        private TariffCalculationByRoomUnit $tariffCalculationByRoomUnit
    )
    {}

    public function getRoomPriceByCoin(int $roomId, int $coinId, int $hotelId): float
    {
        $content = $this->tariffCalculationByRoomUnit->getRoomPriceByCoin($roomId, $coinId, $hotelId);

        if (!$content) {
            throw new \InvalidArgumentException('Room price not found!');
        }

        return $content['price'];
    }

    public function getProfitMargin(int $coinId): float
    {
        $content = $this->tariffCalculationByRoomUnit->getProfitMarginByCoinRequested($coinId);

        if (!$content) {
            throw new \InvalidArgumentException('Profit Margin not found to coin requested!');
        }

        return $content['profit_margin'];
    }

    public function getMoney(int $coinId): string
    {
        $content = $this->tariffCalculationByRoomUnit->getMoney($coinId);

        if (!$content) {
            throw new \DomainException('Money not found to coin requested!');
        }

        return $content['money'];
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