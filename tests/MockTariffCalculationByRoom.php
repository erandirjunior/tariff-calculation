<?php

namespace Tests;

use SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoomUnit;

class MockTariffCalculationByRoom implements TariffCalculationByRoomUnit
{
    public function getRoomPriceByCoin(int $roomId, int $coinId, int $hotelId): array
    {
        $value = 0;
        switch ($coinId) {
            case 1:
                $value = 100;
                break;
            case 2:
                $value = 150;
                break;
            case 3:
                $value = 200;
                break;
        }

        return [
            'price' => $value
        ];
    }

    public function getProfitMarginByCoinRequested(int $coinId): array
    {
        $value = 0;
        switch ($coinId) {
            case 2:
                $value = 10;
                break;
            case 3:
                $value = 15;
                break;
        }
        return [
            'profit_margin' => $value
        ];
    }

    public function getMoney(int $coinId): array
    {
        $value = 0;
        switch ($coinId) {
            case 1:
                $value = 'BRL';
                break;
            case 2:
                $value = 'USD';
                break;
            case 3:
                $value = 'EUR';
                break;
        }

        return [
            'money' => $value
        ];
    }

    public function getSellerProfitMargin(int $sellerId): array
    {
        return [
            'profit_margin' => $sellerId
        ];
    }
}