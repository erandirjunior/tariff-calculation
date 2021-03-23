<?php

namespace SRC\Booking\Domain\Register;

interface TariffCalculationGateway
{
    public function calculate(
        int $currencyBase,
        int $userCurrencyNeed,
        int $roomId,
        int $sellerId,
        int $hotelId
    ): float;
}