<?php

namespace SRC\Booking\Adapters\Gateways;

interface TariffCalculationGatewayUnit
{
    public function calculate(int $currencyBase, int $userCurrencyNeed, int $roomId, int $sellerId, int $hotelId): float;
}