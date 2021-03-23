<?php

namespace SRC\TariffCalculation\Adapter\Gateways;

interface TariffCalculationByRoomUnit
{
    public function getRoomPriceByCoin(int $roomId, int $coinId, int $hotelId): array;

    public function getProfitMarginByCoinRequested(int $coinId): array;

    public function getMoney(int $coinId): array;

    public function getSellerProfitMargin(int $sellerId): array;
}