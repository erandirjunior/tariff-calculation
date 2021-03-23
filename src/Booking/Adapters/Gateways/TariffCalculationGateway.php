<?php

namespace SRC\Booking\Adapters\Gateways;

class TariffCalculationGateway implements \SRC\Booking\Domain\Register\TariffCalculationGateway
{
    public function __construct(
        private TariffCalculationGatewayUnit $tariffCalculationGatewayUnit
    )
    {}

    public function calculate(int $coinBase, int $userCoinNeed, int $roomId, int $sellerId, int $hotelId): float
    {
        return $this->tariffCalculationGatewayUnit->calculate(
            $coinBase,
            $userCoinNeed,
            $roomId,
            $sellerId,
            $hotelId
        );
    }
}