<?php

namespace SRC\Booking\Domain\Register;

interface TariffCalculationGateway
{
    public function calculate(
        int $coinBase,
        int $userCoinNeed,
        int $roomId,
        int $sellerId,
        int $hotelId
    ): float;
}