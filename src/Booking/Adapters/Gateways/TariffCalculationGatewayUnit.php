<?php

namespace SRC\Booking\Adapters\Gateways;

interface TariffCalculationGatewayUnit
{
    public function calculate(int $coinBase, int $userCoinNeed, int $roomId, int $sellerId): float;
}