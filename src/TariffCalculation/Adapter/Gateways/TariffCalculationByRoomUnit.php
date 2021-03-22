<?php

namespace SRC\TariffCalculation\Adapter\Gateways;

interface TariffCalculationByRoomUnit
{
    public function getRoomPriceByCoin(int $roomId, int $coinId): array;

    public function getProfitMarginByCoinRequested(int $coinId): array;

    public function getMoney(int $coinId): array;
}