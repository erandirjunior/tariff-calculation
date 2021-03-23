<?php

namespace SRC\TariffCalculation\Infra\Repository;

use SRC\Coin\Infra\Repository\FindByIdentifier;
use SRC\RoomCoin\Infra\Repository\FindByRoomAndCoin;
use SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoomUnit;

class TariffCalculationByRoom implements TariffCalculationByRoomUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function getRoomPriceByCoin(int $roomId, int $coinId, int $hotelId): array
    {
        $repository = new FindByRoomAndCoin($this->pdo);
        $data = $repository->find($roomId, $coinId, $hotelId);
        return $data ? $data : [];
    }

    public function getProfitMarginByCoinRequested(int $coinId): array
    {
        $coinRepository = new FindByIdentifier($this->pdo);
        $data = $coinRepository->find($coinId);
        return $data ? $data : [];
    }

    public function getMoney(int $coinId): array
    {
        return $this->getProfitMarginByCoinRequested($coinId);
    }

    public function getSellerProfitMargin(int $sellerId): array
    {
        $seller = new \SRC\Seller\Infra\Repository\FindByIdentifier($this->pdo);
        $data = $seller->find($sellerId);
        return $data ? $data : [];
    }
}