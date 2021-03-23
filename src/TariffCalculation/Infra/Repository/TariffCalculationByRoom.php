<?php

namespace SRC\TariffCalculation\Infra\Repository;

use SRC\Currency\Infra\Repository\FindByIdentifier;
use SRC\RoomCurrency\Infra\Repository\FindByRoomAndCurrency;
use SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoomUnit;

class TariffCalculationByRoom implements TariffCalculationByRoomUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function getRoomPriceByCurrency(int $roomId, int $currencyId, int $hotelId): array
    {
        $repository = new FindByRoomAndCurrency($this->pdo);
        $data = $repository->find($roomId, $currencyId, $hotelId);
        return $data ? $data : [];
    }

    public function getProfitMarginByCurrencyRequested(int $currencyId): array
    {
        $currencyRepository = new FindByIdentifier($this->pdo);
        $data = $currencyRepository->find($currencyId);
        return $data ? $data : [];
    }

    public function getCurrency(int $currencyId): array
    {
        return $this->getProfitMarginByCurrencyRequested($currencyId);
    }

    public function getSellerProfitMargin(int $sellerId): array
    {
        $seller = new \SRC\Seller\Infra\Repository\FindByIdentifier($this->pdo);
        $data = $seller->find($sellerId);
        return $data ? $data : [];
    }
}