<?php

namespace SRC\TariffCalculation\Adapter\Gateways;

interface TariffCalculationByRoomUnit
{
    public function getRoomPriceByCurrency(int $roomId, int $currencyId, int $hotelId): array;

    public function getProfitMarginByCurrencyRequested(int $currencyId): array;

    public function getCurrency(int $currencyId): array;

    public function getSellerProfitMargin(int $sellerId): array;
}