<?php

namespace SRC\TariffCalculation\Infra\Repository;

use SRC\Coin\Infra\Repository\FindByIdentifier;
use SRC\RoomCoin\Infra\Repository\FindByRoomAndCoin;
use SRC\TariffCalculation\Adapter\Gateways\TariffCalculationByRoomUnit;

class TariffCalculationByRoom implements TariffCalculationByRoomUnit
{
    public function __construct(private \PDO $pdo)
    {}

    public function getRoomPriceByCoin(int $roomId, int $coinId): array
    {
        $repository = new FindByRoomAndCoin($this->pdo);
        $data = $repository->find($roomId, $coinId);
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
}