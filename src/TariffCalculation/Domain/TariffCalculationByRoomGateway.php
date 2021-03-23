<?php

namespace SRC\TariffCalculation\Domain;

interface TariffCalculationByRoomGateway
{
    public function getRoomPriceByCurrency(int $roomId, int $currencyId, int $hotelId): float;

    public function getProfitMargin(int $currencyId): float;

    public function getSellerProfitMargin(int $sellerId): float;

    public function getMoney(int $currencyId): string;
}