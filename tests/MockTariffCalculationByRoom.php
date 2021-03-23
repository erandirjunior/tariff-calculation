<?php

namespace Tests;

use SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoomUnit;

class MockTariffCalculationByRoom implements TariffCalculationByRoomUnit
{
    public function getRoomPriceByCurrency(int $roomId, int $currencyId, int $hotelId): array
    {
        $value = 0;
        switch ($currencyId) {
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

    public function getProfitMarginByCurrencyRequested(int $currencyId): array
    {
        $value = 0;
        switch ($currencyId) {
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

    public function getCurrency(int $currencyId): array
    {
        $value = 0;
        switch ($currencyId) {
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
            'currency' => $value
        ];
    }

    public function getSellerProfitMargin(int $sellerId): array
    {
        return [
            'profit_margin' => $sellerId
        ];
    }
}