<?php

namespace SRC\TariffCalculation\Domain;

interface TariffCalculationByRoomGateway
{
    public function getRoomPriceByCoin(int $roomId, int $coinId): float;

    public function getProfitMargin(int $coinId): float;

    public function getMoney(int $coinId): string;
}